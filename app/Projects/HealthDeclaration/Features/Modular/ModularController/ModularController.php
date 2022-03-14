<?php

namespace App\Projects\HealthDeclaration\Features\Modular\ModularController;

use App\Mainframe\Features\Modular\ModularController\Traits\ModularControllerTrait;
use App\Mainframe\Features\Modular\ModularController\Traits\RequestProcessorTrait;
use App\Mainframe\Features\Modular\ModularController\Traits\RequestValidator;
use App\Mainframe\Features\Modular\ModularController\Traits\Resolvable;
use App\Module;
use App\Projects\HealthDeclaration\Features\Report\ModuleList;
use App\Projects\HealthDeclaration\Features\Report\ModuleReportBuilder;
use App\Projects\HealthDeclaration\Http\Controllers\BaseController;

class ModularController extends BaseController
{
    use RequestValidator,
        RequestProcessorTrait,
        Resolvable,
        ModularControllerTrait;


    public function __construct()
    {
        parent::__construct();
        $this->initModularController();
    }

    /**
     * Show and render report
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Support\Collection|\Illuminate\View\View|mixed
     */
    public function report()
    {
        if (!user()->can('view-report', $this->model)) {
            return $this->permissionDenied();
        }

        // Note: Utilize project asset instead of Mainframe default
        return (new ModuleReportBuilder($this->module))->output();
    }

    /**
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listJson()
    {
        // Note: Utilize project asset instead of Mainframe default
        return (new ModuleList($this->module))->json();
    }

}