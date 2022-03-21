<?php

namespace App\Projects\HealthDeclaration\Modules\Declarations;

use App\Country;
use App\District;
use App\Division;
use \App\Projects\HealthDeclaration\Features\Modular\ModularController\ModularController;
use \App\Projects\HealthDeclaration\Features\Report\ModuleList;
use App\Upazila;
use App\User;
use App\Vaccine;
use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make(request()->all(), [
            // 'passenger_name' => 'required',
            // 'mobile_no' => 'required|numeric',
            // 'email' => 'email:rfc,dns,filter,strict',
            // 'passenger_dob' => 'required',
            // 'gender' => 'required',
            // 'origin_country_id' => 'required',
            // 'nationality' => 'required',
            // 'passport_no' => 'required',
            // 'flight_no' => 'required',
            // 'district_id' => 'required',
            // 'division_id' => 'required',
            // 'upazila_id' => 'required',
            // 'has_sore_throat' => 'required',
            // 'has_fever' => 'required',
            // 'has_headache' => 'required',
            // 'has_tiredness' => 'required',
            // 'has_cough' => 'required',
            // 'has_shortness_of_breath' => 'required',
            // 'has_loss_of_taste_or_smell' => 'required',
            // 'has_covid' => 'required',
            // 'was_covid_affected' => 'required',
            // 'last_covid_affected_on' => 'required_if:was_covid_affected,1',
            // 'primary_vaccine_id' => 'required',
            // 'first_vaccine_date' => 'required',
        ]);

        if ($validator->fails()) {
            $this->setValidator($validator);

            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (request()->has('origin_country_id')) {
            request()->merge(['origin_country_name' => Country::find(request()->get('origin_country_id'))->name]);
        }
        if (request()->has('journey_from_country_id')) {
            request()->merge(['journey_from_country_name' => Country::find(request()->get('journey_from_country_id'))->name]);
        }
        if (request()->has('division_id')) {
            request()->merge(['division_name' => Division::find(request()->get('division_id'))->name]);
        }
        if (request()->has('district_id')) {
            request()->merge(['district_name' => District::find(request()->get('district_id'))->name]);
        }
        if (request()->has('upazila_id')) {
            request()->merge(['upazila_name' => Upazila::find(request()->get('upazila_id'))->name]);
        }
        if (request()->has('primary_vaccine_id')) {
            request()->merge(['primary_vaccine_name' => Vaccine::find(request()->get('primary_vaccine_id'))->name]);
        }
        if (request()->has('secondary_vaccine_id')) {
            request()->merge(['secondary_vaccine_name' => Vaccine::find(request()->get('secondary_vaccine_id'))->name]);
        }
        //Create user
        $declaration = Declaration::create(request()->all());

        // $this->success('Verify your email and log in.');

        $this->success('Declaration has been created');

        return $this->redirect(route('healthDeclaration-post', $declaration));
    }

    /**
     * @param $declaration
     * @return \Illuminate\Contracts\View\View
     */
    public function healthDeclarationPost($declaration)
    {
        $declaration = Declaration::find($declaration);

        return View::make('projects.health-declaration.modules.declarations.public.postDeclaration', compact(['declaration', $declaration]));
    }

    /**
     * @param $declaration
     * @return \Illuminate\Contracts\View\View
     */
    public function healthDeclarationPrint($declaration)
    {
        $declaration = Declaration::find($declaration);

        $content = null;

        if (isset($declaration->id)) {
            $content .= route('declarations.show', $declaration->id);
        }

        return View::make('projects.health-declaration.modules.declarations.public.declaration-print', compact(['declaration','content']));
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
        $view = 'projects.health-declaration.modules.declarations.public.declaration-print';
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
