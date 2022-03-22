@extends('projects.health-declaration.layouts.pdf-print.template')
<style type="text/css">

    table {
        border-collapse: collapse;
    }
    table td {
        padding: 0px 5px;

    }
    @media print {
        #printPageButton {
            display: none;
        }
    }
</style>
<?php
?>
@section('head-title')
    {{"Declaration Print"}}
@endsection
@section('title-left')
    <button id="printPageButton" class="btn btn-primary" onClick="window.print();">Print This Page</button>

@endsection
@section('title')
    @parent

@endsection
@section('title-right')

@endsection
@section('top')

@endsection
@section('content-top')
    <table class="table-condensed" width="100%">
        <tr>
            <td align="right" style="vertical-align: center">
                <img src="{{asset('projects/health-declaration/logo/GoB.png')}}" width="70px"/>
            </td>
            <td align="center" style="vertical-align: middle">
                <h3>Government of the People's Republic of Bangladesh</h3>
                <h3>Ministry of Health & Family Welfare</h3>
            </td>
            <td align="left" style="vertical-align: center">
                <img src="{{asset('projects/health-declaration/logo/dghs.jpg')}}" width="70px"/>
            </td>
        </tr>
    </table>
@endsection
@section('content')
    <h4 align="center">Health Declaration Card</h4>

    <div class="col-md-12 no-padding no-margin" style="width: 250px; vertical-align: center">
        {!! QrCode::size(250)->generate($content); !!}
    </div>

    <div class="clearfix"></div>
    <h4> Decision: {{$declaration->decision}}</h4>
    <div class="clearfix"></div>
    <h4>Personal Information</h4>
    <table class="table table-bordered no-padding" width="100%">
        <tr>
            <td>Name</td>
            <td>{{$declaration->passenger_name}}</td>
            <td>Gender</td>
            <td>{{$declaration->gender}}</td>
        </tr>
        <tr>
            <td>Passport No</td>
            <td>{{$declaration->passport_no}}</td>
            <td>Nationality</td>
            <td>{{$declaration->nationality}}</td>

        </tr>
        <tr>
            <td>Mode of Transportation</td>
            <td>{{$declaration->mode_of_transport}}</td>
            <td>Visiting From</td>
            <td>{{$declaration->journey_from_country_name}}</td>
        </tr>
        <tr>
            <td>Arrival Date</td>
            <td>{{formatDate($declaration->arrival_date)}}</td>
            <td>Staying At</td>
            <td>{{$declaration->division_name." , ".$declaration->district_name}}</td>
        </tr>
    </table>
    <h4>Covid Information</h4>
    <table class="table table-bordered no-padding" width="100%">
        <tr>
            <td>Is Covid-19 Positive In the Last Three Days?</td>
            <td>{{formatYesNo($declaration->has_covid)}}</td>
            <td>Was Covid-19 Positive And Date?</td>
            <td>{{formatYesNo($declaration->was_covid_affected)." ,".formatDate($declaration->last_covid_affected_on)}}</td>
        </tr>
        <tr>
            <td>Has COVID-19 Vaccination</td>
            <td>{{formatYesNo($declaration->is_vaccinated)}}</td>
            <td>Covid-19 Vaccination Name</td>
            <td>{{$declaration->primary_vaccine_name}}</td>
        </tr>
        <tr>
            <td>1st Dose Date</td>
            <td>{{$declaration->first_vaccine_date}}</td>
            <td>2nd Dose Date</td>
            <td>{{$declaration->second_vaccine_date}}</td>
        </tr>
        <tr>
            <td>Has Taken RT-PCR</td>
            <td>{{formatYesNo($declaration->has_taken_rt_pcr)}}</td>
            <td>Declaration Created At</td>
            <td>{{formatDateTime($declaration->created_at)}}</td>
        </tr>

    </table>

@endsection
@section('content-bottom')

    <h4>Please bring all necessary documents (Vaccination Card/RT-PCR Test Result/Covid-19 Test Result) with this card.</h4>
    {{--    <div class="col-md-6  no-padding pull-left margin">--}}
    {{--        {!! $title ?? '' !!}--}}
    {{--        <span class="small">{!! $content !!}</span>--}}
    {{--    </div>--}}
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@show