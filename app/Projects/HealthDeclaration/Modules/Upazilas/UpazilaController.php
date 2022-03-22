<?php

namespace App\Projects\HealthDeclaration\Modules\Upazilas;

use \App\Projects\HealthDeclaration\Features\Modular\ModularController\ModularController;
use \App\Projects\HealthDeclaration\Features\Report\ModuleList;

/**
 * @group  Upazila
 * APIs for managing upazilas
 */
class UpazilaController extends ModularController
{
    // Note: Pull in necessary traits

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    */
    protected $moduleName = 'upazilas';
    /** @var Upazila */
    protected $element;

    /*
    |--------------------------------------------------------------------------
    | Existing Controller functions
    |--------------------------------------------------------------------------
    | Override the following list of functions to customize the behavior of the controller
    */
    /**
     * Upazila Datatable
     *
     * @return UpazilaDatatable
     */
    public function datatable()
    {
        return new UpazilaDatatable($this->module);
    }

    /**
     * List Upazila
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listJson()
    {
        return (new ModuleList($this->module))->json();
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