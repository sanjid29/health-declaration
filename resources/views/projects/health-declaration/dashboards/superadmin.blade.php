@extends('projects.health-declaration.layouts.default.template')


@section('head-title')
    Admin Dashboard
@endsection

@section('title')
    Admin Dashboard
@endsection

@section('content')
    <?php
    use App\Projects\HealthDeclaration\Contents\SampleContent;
    use App\Projects\HealthDeclaration\Datatables\SampleDatatable;
    ?>

    <div class="clearfix"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green-active">
            <a href="#" style="color:white">
                <span class="info-box-icon">
                    <ion-icon name="file-tray-full-outline"></ion-icon>
{{--                    <ion-icon name="cart-outline"></ion-icon>--}}
                </span>
            </a>

            <div class="info-box-content">
                <span class="info-box-text">Declarations</span>
                <span class="info-box-number">{{$sampleData['declarations']}}</span>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <?php
    $datatable = new SampleDatatable();
    ?>
    @include('mainframe.layouts.module.grid.includes.datatable',['datatable'=>$datatable])
    <div class="clearfix"></div>


@endsection