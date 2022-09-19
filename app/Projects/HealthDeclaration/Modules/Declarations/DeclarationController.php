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
//use Barryvdh\DomPDF\Facade\Pdf;
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
    public function datatable(): DeclarationDatatable
    {
        return new DeclarationDatatable($this->module);
    }

    /**
     * List Declaration
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listJson(): \Illuminate\Http\JsonResponse
    {
        return (new ModuleList($this->module))->json();
    }

    public function createHealthDeclaration(): \Illuminate\Contracts\View\View
    {
        return View::make('projects.health-declaration.modules.declarations.public.createDeclaration');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function healthDeclarationStore(): \Illuminate\Http\RedirectResponse
    {

        $threeDaysBefore = Carbon::now()->subDays(3);
        $threeDaysAfter = Carbon::now()->addDays(3);
        $countryFrom = null;
        $rules = [
            'passenger_name' => 'required',
            'mobile_no' => 'required|numeric',
            'passport_no' => 'required',
            'nationality' => 'required',
            //'email' => 'nullable|email:rfc,dns,filter,strict',

            'age_in_years' => 'required',
            'arrival_date' => 'required|after:'.$threeDaysBefore.'|before:'.$threeDaysAfter,

            'gender' => 'required',
            'country_code_mobile_number' => 'required',
            'mode_of_transport' => 'required',

            //'division_id' => 'required',
            'district_id' => 'required',
            //'local_contact_no' => 'required',

            'have_covid_symptoms' => 'required',
            'is_vaccinated' => 'required',
            'is_rt_pcr_negative' => 'required_if:is_vaccinated,0',
        ];

        $validator = Validator::make(request()->all(), $rules);

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
            request()->merge(['division_id' => District::find(request()->get('district_id'))->division_id]);
            request()->merge(['division_name' => District::find(request()->get('district_id'))->division_name]);
        }
        // if (request()->has('upazila_id') && request()->get('upazila_id')) {
        //     request()->merge(['upazila_name' => Upazila::find(request()->get('upazila_id'))->name]);
        // }
        // if (request()->has('primary_vaccine_id') && request()->get('primary_vaccine_id')) {
        //     request()->merge(['primary_vaccine_name' => Vaccine::find(request()->get('primary_vaccine_id'))->name]);
        // }

        $isVaccinated = request()->get('is_vaccinated');
        $hasRtPCRNegative = request()->get('is_rt_pcr_negative');
        $decision = $reason = $dateToCompare = null;
        $vaccineComplete = false;
        if (request()->get('age_in_years') == '0-12' || $isVaccinated) {

            // if (request()->get('primary_vaccine_id') == '7') {
            //     $dateToCompare = request()->get('first_vaccine_date');
            // } else {
            //     $dateToCompare = request()->get('second_vaccine_date');
            // }
            // if ($dateToCompare) {
            //     $fourteenDaysFlag = false;
            //     if (Time::differenceInDays($dateToCompare, now()) > 14) {
            //         $fourteenDaysFlag = true;
            //     }
            // }
            // if (request()->get('primary_vaccine_id') == '7' && request()->get('first_vaccine_date')) {
            //     $vaccineComplete = true;
            // } elseif (in_array(request()->get('primary_vaccine_id'), [
            //         '1', '2', '3', '4', '5', '6', '8',
            //     ]) && request()->get('first_vaccine_date') && request()->get('second_vaccine_date') && $fourteenDaysFlag) {
            //     $vaccineComplete = true;
            // }
            $vaccineComplete = true;
        }

        if ($vaccineComplete) {
            $decision = "You are Allowed to Travel";
            $reason = "The user has completed Vaccination.";
        } elseif ($hasRtPCRNegative) {
            $decision = "You are Allowed to Travel";
            $reason = "The user has completed Vaccination.";
        } else {
            $reason = "The user has not taken Vaccination and he/she has taken RT-PCR and was positive in the last 72 hours.";
            $decision = "You are Not Allowed to Travel";
        }
        request()->merge(['decision' => $decision, 'remark' => $reason]);

        //Create user
        $declaration = Declaration::create(request()->all());

        // if (filter_var($declaration->email, FILTER_VALIDATE_EMAIL)) {
        //     if ($declaration->decision == "You are Allowed to Travel") {
        //         $content = null;
        //         if (isset($declaration->id)) {
        //             $content .= route('declarations.show', $declaration->id);
        //         }
        //
        //         $fileName = public_path(config('mainframe.config.upload_root'))."Declaration of-".$declaration->passenger_name." on ".formatDateTime($declaration->created_at).".pdf";
        //         $view = 'projects.health-declaration.modules.declarations.public.declaration-pdf';
        //         $pdf = PDF::loadView($view, [
        //             'declaration' => $declaration,
        //             'content' => $content,
        //         ]);
        //         $pdf->save($fileName);
        //     }
        //     Mail::to($declaration->email)
        //         ->queue(new EmailToPassenger($declaration));
        // }

        return $this->redirect(route('healthDeclaration-post', $declaration->uuid));
    }

    /**
     * @param $declaration
     * @return \Illuminate\Contracts\View\View
     */
    public function healthDeclarationPost($uuid): \Illuminate\Contracts\View\View
    {
        $declaration = Declaration::where('uuid', $uuid)->first();
        if ($declaration) {
            return View::make('projects.health-declaration.modules.declarations.public.postDeclaration', compact(['declaration', $declaration]));

        }
        abort(404);

    }

    /**
     * @param $declaration
     * @return \Illuminate\Contracts\View\View
     */
    public function healthDeclarationPrint($uuid): \Illuminate\Contracts\View\View
    {
        $declaration = Declaration::where('uuid', $uuid)->first();
        if ($declaration) {
            $content = null;

            if (isset($declaration->id)) {
                $content .= route('declarations.show', $declaration->id);
            }

            return View::make('projects.health-declaration.modules.declarations.public.declaration-print', compact(['declaration', 'content']));

        }
        abort(404);
    }

    public function downloadPdf($uuid)
    {
        // Resolve file name and blade view
        $declaration = Declaration::where('uuid', $uuid)->first();
        if ($declaration) {
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
        abort(404);
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
