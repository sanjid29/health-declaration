<?php

namespace App\Projects\HealthDeclaration\Features\Datatable;

use App\Mainframe\Features\Datatable\Traits\ModuleDatatableTrait;

class ModuleDatatable extends Datatable
{
    use ModuleDatatableTrait;

    /** @var \App\Module */
    public $module;

    /**
     * @param $module
     */
    public function __construct($module = null)
    {
        parent::__construct();
        $this->setModule($module);
    }

}