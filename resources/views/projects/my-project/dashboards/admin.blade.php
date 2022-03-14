@extends('projects.my-project.layouts.default.template')


@section('head-title')
    Admin Dashboard
@endsection

@section('title')
    Admin Dashboard
@endsection

@section('content')
    Welcome to mainframe

    {{content('sample-content','my-content')}}

    <?php
    use App\Projects\MyProject\Contents\SampleContent;use App\Projects\MyProject\Datatables\SampleDatatable;
    $sampleContent = (new SampleContent())->get('body');
    $user = \App\Module::byName('users')->modelInstance();
    ?>

    <div class="clearfix"></div>
    {!! $sampleContent  !!}


    <div class="clearfix"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green-active">
            <a href="#" style="color:white">
                <span class="info-box-icon">
                    <ion-icon name="cart-outline"></ion-icon>
                </span>
            </a>

            <div class="info-box-content">
                <span class="info-box-text">Orders</span>
                <span class="info-box-number">ORders</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                </div>
                <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <?php
    $datatable = new SampleDatatable();


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