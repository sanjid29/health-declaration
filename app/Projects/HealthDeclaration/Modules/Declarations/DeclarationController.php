<?php

namespace App\Projects\HealthDeclaration\Modules\Declarations;

use \App\Projects\HealthDeclaration\Features\Modular\ModularController\ModularController;
use \App\Projects\HealthDeclaration\Features\Report\ModuleList;
use App\User;
use Illuminate\Support\Facades\Validator;
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

    public function healthDeclarationStore()
    {
        $validator = Validator::make(request()->all(), [
            'passenger_name' => 'required',
            'mobile_no' => 'required|numeric',
            'email' => 'required|email:rfc,dns,filter,strict',
            'passenger_dob' => 'required',
            'gender' => 'required',
            'origin_country_id' => 'required',
            'nationality' => 'required',
            'passport_no' => 'required',
            'flight_no' => 'required',
            'district_id' => 'required',
            'division_id' => 'required',
            'upazila_id' => 'required',
            'has_sore_throat' => 'required',
            'has_fever' => 'required',
            'has_headache' => 'required',
            'has_tiredness' => 'required',
            'has_cough' => 'required',
            'has_shortness_of_breath' => 'required',
            'has_loss_of_taste_or_smell' => 'required',
            'has_covid' => 'required',
        ]);

        // if ($validator->fails()) {
        //     $this->setValidator($validator);
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        //Create user
        $declaration = Declaration::create(request()->all());

        // $this->success('Verify your email and log in.');

        $this->success('Please Check You Email, A copy of the declaration has been sent to your email address');

        return $this->redirect(route('healthDeclaration-post'));
    }

    public function healthDeclarationPost()
    {
        return View::make('projects.health-declaration.modules.declarations.public.post-declaration');
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
