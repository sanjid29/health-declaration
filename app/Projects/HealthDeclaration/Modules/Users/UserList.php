<?php

namespace App\Projects\HealthDeclaration\Modules\Users;

use App\Projects\HealthDeclaration\Features\Report\ModuleReportBuilder;

class UserList extends ModuleReportBuilder
{
    /**
     * @var string[]
     */
    public $fullTextFields = ['name', 'name_ext', 'email', 'first_name', 'last_name'];
}