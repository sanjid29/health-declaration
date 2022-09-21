@extends('projects.health-declaration.layouts.pdf-print.template')

@section('head-title')
    {{"Declaration Print"}}
@endsection
@section('title-left')

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
                <img src="{{public_path().'/projects/health-declaration/logo/GoB.png'}}" width="70px"/>
            </td>
            <td align="center" style="vertical-align: middle">
                <h3>Government of the People's Republic of Bangladesh</h3>
                <h3>Ministry of Health & Family Welfare</h3>
            </td>
            <td align="left" style="vertical-align: center">
                <img src="{{public_path().'/projects/health-declaration/logo/dghs.jpg'}}" width="70px"/>
            </td>
        </tr>
    </table>
@endsection
@section('content')
    <h4 align="center">Health Declaration Card</h4>

    <div class="col-md-12 no-padding no-margin" style="width: 200px; vertical-align: center">
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate($content)) !!} "
             alt="{{$content}}">
    </div>

    <div class="clearfix"></div>
    @if($declaration->decision=='You are Allowed to Travel')
        <h4 style="color:green;"> Decision: {{$declaration->decision}}. {!! "&#10003" !!}</h4>
        <div class="clearfix"></div>
        @if(((isset($declaration->have_covid_symptoms) && $declaration->have_covid_symptoms)) || (isset($declaration->have_monkey_pox_symptoms) && $declaration->have_monkey_pox_symptoms))
            <h4 style="color:red;">After coming to Bangladesh please contact with Health Desk Before Immigration</h4>
            <h4 style="color:red;font-family:solaiman-lipi">বাংলাদেশে আসার পর ইমিগ্রেশনের আগে হেলথ ডেস্কের সাথে যোগাযোগ করুন</h4>
        @endif
    @else
        <h4 style="color:red;"> Decision: {{$declaration->decision}}. {!! "&#10060" !!}</h4>
    @endif



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
            <td>{{ucwords($declaration->mode_of_transport)}}</td>
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
            <td>Has COVID-19 Vaccination</td>
            <td>{!!formatBoolean($declaration->is_vaccinated)!!}</td>
            {{--            <td>Covid-19 Vaccination Name</td>--}}
            {{--            <td>{{$declaration->primary_vaccine_name}}</td>--}}
        </tr>
        {{--        <tr>--}}
        {{--            <td>1st Dose Date</td>--}}
        {{--            <td>{{$declaration->first_vaccine_date}}</td>--}}
        {{--            <td>2nd Dose Date</td>--}}
        {{--            <td>{{$declaration->second_vaccine_date}}</td>--}}
        {{--        </tr>--}}
        <tr>
            <td>Negative In RT-PCR test in last 72 hours?</td>
            <td>{!!formatBoolean($declaration->is_rt_pcr_negative)!!}</td>
            <td>Declaration Created at</td>
            <td>{{formatDateTime($declaration->created_at)}}</td>
        </tr>

    </table>

@endsection
@section('content-bottom')

    <h4>Please carry all necessary documents (Vaccination Certificate/Covid-19 Test Result) with this card.</h4>
    <h4 style="color:red;font-family:solaiman-lipi">অনুগ্রহ করে এই কার্ডের সাথে সমস্ত প্রয়োজনীয় কাগজপত্র (টিকাকরণ শংসাপত্র/কোভিড-১৯ পরীক্ষার ফলাফল) সঙ্গে
        রাখুন।</h4>
    {{--    <div class="col-md-6  no-padding pull-left margin">--}}
    {{--        {!! $title ?? '' !!}--}}
    {{--        <span class="small">{!! $content !!}</span>--}}
    {{--    </div>--}}
@endsection

@section('js')
    <script type="text/javascript">

    </script>
@show