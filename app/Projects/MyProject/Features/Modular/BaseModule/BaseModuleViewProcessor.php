<?php

namespace App\Projects\MyProject\Features\Modular\BaseModule;

use App\Projects\MyProject\Features\Core\ViewProcessor;

class BaseModuleViewProcessor extends ViewProcessor
{
    /*
    |--------------------------------------------------------------------------
    | Blade template locations
    |--------------------------------------------------------------------------
    */
    // public function formPath($state = 'create') { }
    // public function gridPath() { }
    // public function changesPath() { }

    /*
    |--------------------------------------------------------------------------
    | View Variables
    |--------------------------------------------------------------------------
    */
    // public function varsCreate() { }
    // public function viewVarsEdit() { }
    // public function getImmutables() { }
    // public function formTitle() { }

    /*
    |--------------------------------------------------------------------------
    | Condition functions to show a section in view
    |--------------------------------------------------------------------------
    */
    // public function showFormCreateBtn() { }
    // public function showFormListBtn() { }
    // public function showReportLink() { }
    // public function showTenantSelector() { }

    /**
     * Show clone button in module form
     *
     * @return bool
     */
    public function showCloneBtn()
    {

        if (!$this->element->isCreated()) {
            return false;
        }

        if (!$this->user->can('create', $this->element)) {
            return false;
        }

        $cloneable = [
            'settings',
        ];

        // return in_array($this->module->name, $cloneable);
        return true;
    }
}