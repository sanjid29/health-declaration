@extends('projects.health-declaration.layouts.module.grid.template')

<?php
/**
 * @var \App\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Declaration $element
 * @var \App\Declaration $declaration
 * @var \App\Projects\HealthDeclaration\Modules\Declarations\DeclarationViewProcessor $view
 */
?>
@section('content-top')
    <div class="row">
        <div class="col-md-12">
            <form action="{{route($module->name.'.index')}}" method="get" class="form-group-fields">
                @include('form.date',['var'=>['name'=>'arrival_date_from','label'=>'Date of Arrival From', 'div'=>'col-sm-3']])
                @include('form.date',['var'=>['name'=>'arrival_date_till','label'=>'Date of Arrival Till', 'div'=>'col-sm-3']])

                <div class="clearfix"></div>
                @include('form.select-array',['var'=>['name'=>'have_covid_symptoms','label'=>'Has Covid Symptoms?', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
                @include('form.select-array',['var'=>['name'=>'have_monkey_pox_symptoms','label'=>'Has Monkey Pox?', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
                @include('form.select-array',['var'=>['name'=>'is_vaccinated','label'=>'Is Vaccinated?', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
                <div class="clearfix"></div>
                @include('form.text',['var'=>['name'=>'passport_no','label'=>'Passport No', 'div'=>'col-sm-3']])
                @include('form.text',['var'=>['name'=>'mobile_no','label'=>'Mobile No', 'div'=>'col-sm-3']])
                @include('form.text',['var'=>['name'=>'flight_no','label'=>'Flight No', 'div'=>'col-sm-3']])
                <div class="clearfix"></div>

                @include('form.select-array',['var'=>['name'=>'is_archived','label'=>'Show Archived', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
                @include('form.select-array',['var'=>['name'=>'show_all','label'=>'Show All', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])

                <div class="col-md-4 pull-right">
                    <button class="btn btn-sm btn-success" style="" type="submit">Filter</button>
                    <a class="btn btn-default border-radius-last" style="background: white" href="{{route($module->name.'.index')}}">Reset</a>
                </div>
            </form>
        </div>

    </div>
@endsection
