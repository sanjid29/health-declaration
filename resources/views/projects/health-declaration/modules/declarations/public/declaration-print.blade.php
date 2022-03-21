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

    <table class="table-condensed" width="100%">
        <tr>
            <td>Name</td>
            <td>{{$declaration->passenger_name}}</td>
            <td>Gender</td>
            <td>{{$declaration->gender}}</td>
            <td>Passport No</td>
            <td>{{$declaration->passport_no}}</td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td>{{$declaration->nationality}}</td>
            <td>Mode of Transportation</td>
            <td>{{$declaration->mode_of_transport}}</td>
            <td>Visiting From</td>
            <td>{{$declaration->journey_from_country_name}}</td>
        </tr>

        <tr>
            <td>Is Covid-19 Positive In the Last Three Days?</td>
            <td>{{$declaration->has_covid}}</td>
            <td>Was Covid-19 Positive?</td>
            <td>{{$declaration->was_covid_affected}}</td>
            <td>Last Covid-19 Positive On</td>
            <td>{{$declaration->last_covid_affected_on}}</td>
        </tr>
        <tr>
            <td>Covid-19 Vaccination</td>
            <td>{{$declaration->primary_vaccine_name}}</td>
            <td>1st Dose Date</td>
            <td>{{$declaration->first_vaccine_date}}</td>
            <td>2nd Dose Date</td>
            <td>{{$declaration->second_vaccine_date}}</td>
        </tr>
        <tr>
            <td>Created At</td>
            <td>{{formatDateTime($declaration->created_at)}}</td>
            <td>Arrival Date</td>
            <td>{{formatDate($declaration->arrival_date)}}</td>
            <td>Staying At</td>
            <td>{{"Division ".$declaration->division_name." District ".$declaration->district_name}}</td>
        </tr>

    </table>

@endsection
@section('content-bottom')

    <div class="col-md-4 no-padding no-margin pull-left" style="width: 150px">
        {!! QrCode::size(150)->generate($content); !!}
    </div>
{{--    <div class="col-md-6  no-padding pull-left margin">--}}
{{--        {!! $title ?? '' !!}--}}
{{--        <span class="small">{!! $content !!}</span>--}}
{{--    </div>--}}
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@show