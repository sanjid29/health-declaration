<?php

namespace App\Projects\HealthDeclaration\Http\Controllers;


use App\Projects\HealthDeclaration\DataBlocks\AdminDataBlock;
use App\Projects\HealthDeclaration\DataBlocks\SampleDataBlock;

class HomeController extends BaseController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(user()->isSuperUser()){
            $this->view('projects.health-declaration.dashboards.superadmin');
            $sampleData = (new SampleDataBlock)->data();

            return $this->response()
                ->setViewVars(['sampleData' => $sampleData])
                ->send();
        }
        if(user()->isAdmin()){
            $this->view('projects.health-declaration.dashboards.admin');
            $adminData = (new AdminDataBlock)->data();

            return $this->response()
                ->setViewVars(['adminData' => $adminData])
                ->send();
        }
    }

}