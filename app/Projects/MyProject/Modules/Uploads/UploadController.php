<?php

namespace App\Projects\MyProject\Modules\Uploads;

use App\Mainframe\Modules\Uploads\Traits\UploadControllerTrait;
use App\Projects\MyProject\Features\Modular\ModularController\ModularController;

/**
 * @group  Uploads
 * APIs for managing uploads
 */
class UploadController extends ModularController
{

    use UploadControllerTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'uploads';

    /**
     * @return UploadDatatable
     */
    public function datatable()
    {
        return new UploadDatatable($this->module);
    }
}