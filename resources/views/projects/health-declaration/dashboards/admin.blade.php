@extends('projects.health-declaration.layouts.default.template')


@section('head-title')
    Admin Dashboard
@endsection

@section('title')
    Admin Dashboard
@endsection

@section('content')
    <div class="clearfix"></div>
    <div class="col-md-3">
        <div class="info-box bg-smart-blue">
            <a href="{{route('declarations.index')}}" style="color:white"> <span class="info-box-text" align="center">Health Declaration </span>
                <span class="info-box-icon">
                    <i class="fa fa-building" aria-hidden="true"></i>
                </span>
            </a>
            <div class="info-box-content">

                <span class="info-box-number">Total : {{$adminData['declarations']}}</span>
                <span class="info-box-number">Archived : {{$adminData['archived-declarations']}}</span>
                <span class="info-box-number">Created Today : {{$adminData['today-declarations']}}</span>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    @include('projects.health-declaration.dashboards.includes.daily-declaration-datatable')
    @include('projects.health-declaration.dashboards.includes.declaration-datatable')

    <div class="clearfix"></div>

    <?php
    // $datatable = new \App\Projects\MphMarket\Modules\Orders\OrderDatatable('orders');
    ?>
    {{--    @include('mainframe.layouts.module.grid.includes.datatable',compact($datatable));--}}

@endsection