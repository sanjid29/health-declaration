@extends('projects.health-declaration.layouts.module.form.template')
<?php
/**
 * @var \App\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\District $element
 * @var \App\District $district
 * @var \App\Tenant $tenant
 * @var \App\Projects\HealthDeclaration\Modules\Districts\DistrictViewProcessor $view
 */
$district = $element;
?>

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{---------------|  Form input start |-----------------------}}
        @include('form.text',['var'=>['name'=>'name','label'=>'Name']])
        @include('form.text',['var'=>['name'=>'code','label'=>'Code']])
        @include('form.select-model',['var'=>['name'=>'division_id','label'=>'Division', 'name_field'=>'name', 'model'=>\App\Division::class,'class'=>'select2']])

        @include('form.is-active')
        {{---------------|  Form input start |-----------------------}}

        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    {{--    <div class="col-md-6 no-padding-l">--}}
    {{--        <h5>File upload</h5><small>Upload one or more files</small>--}}
    {{--        @include('form.uploads',['var'=>['limit'=>99,'type'=>\App\Upload::TYPE_GENERIC]])--}}
    {{--    </div>--}}
@endsection

@section('js')
    @parent
    @include('projects.health-declaration.modules.districts.form.js')
@endsection