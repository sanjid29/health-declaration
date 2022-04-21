<?php

namespace App\Projects\HealthDeclaration\Modules\Declarations;

use App\Country;
use App\District;
use App\Division;
use \App\Projects\HealthDeclaration\Features\Modular\ModularController\ModularController;
use \App\Projects\HealthDeclaration\Features\Report\ModuleList;
use App\Projects\HealthDeclaration\Helpers\Time;
use App\Projects\HealthDeclaration\Mails\EmailToPassenger;
use App\Upazila;
use App\User;
use App\Vaccine;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Mail;
use PDF;
use Request;
use View;

/**
 * @group  Declaration
 * APIs for managing declarations
 */
class DeclarationController extends ModularController
{
    // Note: Pull in necessary traits

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    */
    protected $moduleName = 'declarations';
    /** @var Declaration */
    protected $element;

    /*
    |--------------------------------------------------------------------------
    | Existing Controller functions
    |--------------------------------------------------------------------------
    | Override the following list of functions to customize the behavior of the controller
    */
    /**
     * Declaration Datatable
     *
     * @return DeclarationDatatable
     */
    public function datatable()
    {
        return new DeclarationDatatable($this->module);
    }

    /**
     * List Declaration
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listJson()
    {
        return (new ModuleList($this->module))->json();
    }

    public function createHealthDeclaration()
    {
        return View::make('projects.health-declaration.modules.declarations.public.createDeclaration');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function healthDeclarationStore()
    {

        $threeDaysBefore=Carbon::now()->subDays(3);
        $threeDaysAfter = Carbon::now()->addDays(3);

        $validator = Validator::make(request()->all(), [
            'passenger_name' => 'required',
            'mobile_no' => 'required|numeric',
            'passport_no' => 'required',
            'email' => 'email:rfc,dns,filter,strict',
            'passenger_dob' => 'required',
            'start_date' => 'required|after:'.$threeDaysBefore.'|before:'.$threeDaysAfter,
            'gender' => 'required',
            'country_code_mobile_number' => 'required',
            'mode_of_transport' => 'required',

            'address_type' => 'required',
            'district_id' => 'required',
            'division_id' => 'required',

            'village' => 'required_if:address_type,rural',
            'upazila_id' => 'required_if:address_type,town',
            'city_corporation' => 'required_if:address_type,town',



            'have_covid_symptoms' => 'required',
            'is_vaccinated' => 'required',
            'primary_vaccine_id' => 'required_if:is_vaccinated,1',
            'is_rt_pcr_negative' => 'required_if:is_vaccinated,0',
            'first_vaccine_date' => 'required_unless:primary_vaccine_id,null',
        ]);

        if ($validator->fails()) {
            $this->setValidator($validator);

            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (request()->has('journey_from_country_id') && request()->get('journey_from_country_id')) {
            request()->merge(['journey_from_country_name' => Country::find(request()->get('journey_from_country_id'))->name]);
        }
        if (request()->has('division_id') && request()->get('division_id')) {
            request()->merge(['division_name' => Division::find(request()->get('division_id'))->name]);
        }
        if (request()->has('district_id') && request()->get('district_id')) {
            request()->merge(['district_name' => District::find(request()->get('district_id'))->name]);
        }
        if (request()->has('upazila_id') && request()->get('upazila_id')) {
            request()->merge(['upazila_name' => Upazila::find(request()->get('upazila_id'))->name]);
        }
        if (request()->has('primary_vaccine_id') && request()->get('primary_vaccine_id')) {
            request()->merge(['primary_vaccine_name' => Vaccine::find(request()->get('primary_vaccine_id'))->name]);
        }


        if (request()->has('is_vaccinated')) {
            $decision = $reason = $secondDoseDate=$fourteenDaysFlag=null;
            $isVaccinated = request()->get('is_vaccinated');
            $hasRtPCRNegative = request()->get('is_rt_pcr_negative');
            if(request()->get('second_vaccine_date')){
                $secondDoseDate=request()->get('second_vaccine_date');
                $fourteenDaysFlag=false;
                if(Time::differenceInDays($secondDoseDate,now())>14){
                    $fourteenDaysFlag=true;
                }
            }


            if ($isVaccinated) {
                if (request()->get('primary_vaccine_id') == '7' && request()->get('first_vaccine_date')) {
                    $decision = "You are Allowed to Travel";
                    $reason = "The user has completed Vaccination.";
                } elseif (request()->get('primary_vaccine_id') && request()->get('first_vaccine_date') && request()->get('second_vaccine_date') && $fourteenDaysFlag) {
                    $decision = "You are Allowed to Travel";
                    $reason = "The user has completed Vaccination.";
                } else{
                    $decision = "You are not Allowed to Travel";
                    $reason = "The user has not completed vaccination,he does not have both vaccine dates or 14 days has not passed from the second vaccination date";
                }

            } elseif ($hasRtPCRNegative) {
                $decision = "You are Allowed to Travel";
                $reason = "The user has not taken Vaccination but he/she has taken RT-PCR test and was negative in the last 72 hours.";
            } else {
                $reason = "The user has not taken Vaccination and he/she has taken RT-PCR and was positive in the last 72 hours.";
                $decision = "You are Not Allowed to Travel";
            }
            request()->merge(['decision' => $decision, 'remark' => $reason]);
        }

        //Create user
        $declaration = Declaration::create(request()->all());

        if(filter_var($declaration->email,FILTER_VALIDATE_EMAIL)){
            if($declaration->decision=="You are Allowed to Travel"){
                $content = null;
                if (isset($declaration->id)) {
                    $content .= route('declarations.show', $declaration->id);
                }

                $fileName = public_path(config('mainframe.config.upload_root'))."Declaration of-".$declaration->passenger_name." on ".formatDate($declaration->created_at).".pdf";
                $view = 'projects.health-declaration.modules.declarations.public.declaration-pdf';
                $pdf = PDF::loadView($view, [
                    'declaration' => $declaration,
                    'content' => $content,
                ]);
                $pdf->save($fileName);
            }
            Mail::to($declaration->email)
                ->queue(new EmailToPassenger($declaration));
        }

        // $this->success('Verify your email and log in.');

        // $this->success('Declaration has been created');

        return $this->redirect(route('healthDeclaration-post', $declaration));
    }

    /**
     * @param $declaration
     * @return \Illuminate\Contracts\View\View
     */
    public function healthDeclarationPost($declaration)
    {
        $declaration = Declaration::findorFail($declaration);

        return View::make('projects.health-declaration.modules.declarations.public.postDeclaration', compact(['declaration', $declaration]));
    }

    /**
     * @param $declaration
     * @return \Illuminate\Contracts\View\View
     */
    public function healthDeclarationPrint($declaration)
    {
        $declaration = Declaration::findorFail($declaration);

        $content = null;

        if (isset($declaration->id)) {
            $content .= route('declarations.show', $declaration->id);
        }

        return View::make('projects.health-declaration.modules.declarations.public.declaration-print', compact(['declaration', 'content']));
    }

    public function downloadPdf($declaration)
    {
        // Resolve file name and blade view
        $declaration = Declaration::find($declaration);
        $content = null;
        if (isset($declaration->id)) {
            $content .= route('declarations.show', $declaration->id);
        }
        $fileName = "Declaration of-".$declaration->passenger_name." on ".formatDate($declaration->created_at).".pdf";
        $view = 'projects.health-declaration.modules.declarations.public.declaration-pdf';
        $pdf = PDF::loadView($view, [
            'declaration' => $declaration,
            'content' => $content,
        ]);

        return $pdf->download($fileName);
    }
    // public function report() { }
    // public function storeRequestValidator() { }
    // public function updateRequestValidator() { }
    // public function saveRequestValidator() { }
    // public function attemptStore() { }
    // public function attemptUpdate() { }
    // public function attemptDestroy() { }
    // public function stored() { }
    // public function updated() { }
    // public function saved() { }
    // public function deleted() { }

    /*
    |--------------------------------------------------------------------------
    | Custom Controller functions
    |--------------------------------------------------------------------------
    | Write down additional controller functions that might be required for your project to handle bu
    */

}
