@extends('projects.health-declaration.layouts.default.template')


@section('head-title')
    Admin Dashboard
@endsection

@section('title')
    Admin Dashboard
@endsection

@section('content')
    <div class="clearfix"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green-active">
            <a href="#" style="color:white">
                <span class="info-box-icon">
                    <ion-icon name="cart-outline"></ion-icon>
                </span>
            </a>

            <div class="info-box-content">
                <span class="info-box-text">Declaration</span>
                <span class="info-box-number">{{$adminData['declarations']}}</span>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <?php
    $datatable = new \App\Projects\HealthDeclaration\Datatables\DeclarationDatatable();


    // echo classKey($datatable). "<br>";
    // echo classKey('MyClass'). "<br>";
    // echo classKey('\MyClass'). "<br>";
    // echo classKey('\Some\Path\MyClass'). "<br>";
    //
    // echo classVar($datatable). "<br>";
    // echo classVar('MyClass'). "<br>";
    // echo classVar('\MyClass'). "<br>";
    // echo classVar('\Some\Path\MyClass'). "<br>";
    //
    // echo classSnakeKey($datatable). "<br>";
    // echo classSnakeKey('MyClass'). "<br>";
    // echo classSnakeKey('\MyClass'). "<br>";
    // echo classSnakeKey('\Some\Path\MyClass'). "<br>";

    ?>
    @include('mainframe.layouts.module.grid.includes.datatable',['datatable'=>$datatable])
    <div class="clearfix"></div>

    <?php
    // $datatable = new \App\Projects\MphMarket\Modules\Orders\OrderDatatable('orders');
    ?>
    {{--    @include('mainframe.layouts.module.grid.includes.datatable',compact($datatable));--}}

@endsection