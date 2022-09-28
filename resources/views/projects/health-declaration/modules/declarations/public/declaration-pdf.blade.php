@extends('projects.health-declaration.layouts.pdf-print.template')
<style>

    @font-face {
        font-family: "solaiman-lipi";
        src: url("fonts/solaiman-lipi.ttf");
    }
    body {
        margin: 0;
        font-family: 'Quicksand', sans-serif;
        font-style: normal;
        font-size: 0.9em;
        font-weight: inherit;
        line-height: 1.2;
        color: #000000;
        text-align: left;
        background-color: #fff
    }

    @page {
        margin: 1rem;
        size: portrait;
    }
    .center{
        text-align: center;
    }
    .clearfix{
        clear: both;
    }
    hr {
        /*margin-top: 1rem;*/
        margin-top: 0;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .3)
    }

    .header-line-up {
        border: 0;
        /*border-top: 1px solid rgba(0, 0, 0, .3);*/
        margin-top: 1rem;
        margin-bottom: 0;
        /*margin-bottom: 5px;*/
    }

    h1, h2, h3, h4, h5, h6 {
        margin-top: 0;
        margin-bottom: 0;
    }

    p {
        margin-top: 0;
        margin-bottom: 0;
    }

    blockquote {
        margin: 0 0 1rem
    }

    b, strong {
        font-weight: bolder
    }

    a {
        color: #0056b3;
        text-decoration: none;
        background-color: transparent
    }

    a:hover {
        color: #0056b3;
        text-decoration: underline
    }

    img {
        vertical-align: middle;
        border-style: none
    }

    table {
        border-collapse: collapse
    }

    th {
        text-align: inherit
    }

    .h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
        /*margin-bottom: .5rem;*/
        font-weight: 500;
        line-height: 1.2
    }

    .h1, h1 {
        font-size: 2rem
    }

    .h2, h2 {
        font-size: 1.75rem
    }

    .h3, h3 {
        font-size: 1.5rem
    }

    .h4, h4 {
        font-size: 1.3rem
    }

    .h5, h5 {
        /*font-size: 1.25rem*/
        font-size: 1.1rem
    }

    .h6, h6 {
        /*font-size: 1rem*/
        font-size: .85rem
    }

    .small, small {
        font-size: 80%;
        font-weight: 400
    }

    .container {
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto
    }



    @media (min-width: 992px) {
        .container {
            max-width: 960px
        }
    }



    .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px
    }
    .col {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%
    }
    @media (min-width: 576px) {
        .col-sm {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%
        }

        .row-cols-sm-1 > * {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%
        }

        .row-cols-sm-2 > * {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%
        }

        .row-cols-sm-3 > * {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%
        }

        .row-cols-sm-4 > * {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%
        }

        .row-cols-sm-5 > * {
            -ms-flex: 0 0 20%;
            flex: 0 0 20%;
            max-width: 20%
        }

        .row-cols-sm-6 > * {
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%
        }

        .col-sm-auto {
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: auto;
            max-width: 100%
        }

        .col-sm-1 {
            -ms-flex: 0 0 8.333333%;
            flex: 0 0 8.333333%;
            max-width: 8.333333%
        }

        .col-sm-2 {
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%
        }

        .col-sm-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%
        }

        .col-sm-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%
        }

        .col-sm-5 {
            -ms-flex: 0 0 41.666667%;
            flex: 0 0 41.666667%;
            max-width: 41.666667%
        }

        .col-sm-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%
        }

        .col-sm-7 {
            -ms-flex: 0 0 58.333333%;
            flex: 0 0 58.333333%;
            max-width: 58.333333%
        }

        .col-sm-8 {
            -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
            max-width: 66.666667%
        }

        .col-sm-9 {
            -ms-flex: 0 0 75%;
            flex: 0 0 75%;
            max-width: 75%
        }

        .col-sm-10 {
            -ms-flex: 0 0 83.333333%;
            flex: 0 0 83.333333%;
            max-width: 83.333333%
        }

        .col-sm-11 {
            -ms-flex: 0 0 91.666667%;
            flex: 0 0 91.666667%;
            max-width: 91.666667%
        }

        .col-sm-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%
        }

    }

    @media (min-width: 768px) {
        .col-md {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%
        }

        .row-cols-md-1 > * {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%
        }

        .row-cols-md-2 > * {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%
        }

        .row-cols-md-3 > * {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%
        }

        .row-cols-md-4 > * {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%
        }

        .row-cols-md-5 > * {
            -ms-flex: 0 0 20%;
            flex: 0 0 20%;
            max-width: 20%
        }

        .row-cols-md-6 > * {
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%
        }

        .col-md-auto {
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: auto;
            max-width: 100%
        }

        .col-md-1 {
            -ms-flex: 0 0 8.333333%;
            flex: 0 0 8.333333%;
            max-width: 8.333333%
        }

        .col-md-2 {
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%
        }

        .col-md-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%
        }

        .col-md-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%
        }

        .col-md-5 {
            -ms-flex: 0 0 41.666667%;
            flex: 0 0 41.666667%;
            max-width: 41.666667%
        }

        .col-md-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%
        }

        .col-md-7 {
            -ms-flex: 0 0 58.333333%;
            flex: 0 0 58.333333%;
            max-width: 58.333333%
        }

        .col-md-8 {
            -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
            max-width: 66.666667%
        }

        .col-md-9 {
            -ms-flex: 0 0 75%;
            flex: 0 0 75%;
            max-width: 75%
        }

        .col-md-10 {
            -ms-flex: 0 0 83.333333%;
            flex: 0 0 83.333333%;
            max-width: 83.333333%
        }

        .col-md-11 {
            -ms-flex: 0 0 91.666667%;
            flex: 0 0 91.666667%;
            max-width: 91.666667%
        }

        .col-md-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%
        }

    }

    @media (min-width: 992px) {
        .col-lg {
            -ms-flex-preferred-size: 0;
            flex-basis: 0;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-width: 100%
        }

        .row-cols-lg-1 > * {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%
        }

        .row-cols-lg-2 > * {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%
        }

        .row-cols-lg-3 > * {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%
        }

        .row-cols-lg-4 > * {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%
        }

        .row-cols-lg-5 > * {
            -ms-flex: 0 0 20%;
            flex: 0 0 20%;
            max-width: 20%
        }

        .row-cols-lg-6 > * {
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%
        }

        .col-lg-auto {
            -ms-flex: 0 0 auto;
            flex: 0 0 auto;
            width: auto;
            max-width: 100%
        }

        .col-lg-1 {
            -ms-flex: 0 0 8.333333%;
            flex: 0 0 8.333333%;
            max-width: 8.333333%
        }

        .col-lg-2 {
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%
        }

        .col-lg-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%
        }

        .col-lg-4 {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%
        }

        .col-lg-5 {
            -ms-flex: 0 0 41.666667%;
            flex: 0 0 41.666667%;
            max-width: 41.666667%
        }

        .col-lg-6 {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%
        }

        .col-lg-7 {
            -ms-flex: 0 0 58.333333%;
            flex: 0 0 58.333333%;
            max-width: 58.333333%
        }

        .col-lg-8 {
            -ms-flex: 0 0 66.666667%;
            flex: 0 0 66.666667%;
            max-width: 66.666667%
        }

        .col-lg-9 {
            -ms-flex: 0 0 75%;
            flex: 0 0 75%;
            max-width: 75%
        }

        .col-lg-10 {
            -ms-flex: 0 0 83.333333%;
            flex: 0 0 83.333333%;
            max-width: 83.333333%
        }

        .col-lg-11 {
            -ms-flex: 0 0 91.666667%;
            flex: 0 0 91.666667%;
            max-width: 91.666667%
        }

        .col-lg-12 {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%
        }

    }

    @media (min-width: 1200px) {

        .row-cols-xl-1 > * {
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%
        }

        .row-cols-xl-2 > * {
            -ms-flex: 0 0 50%;
            flex: 0 0 50%;
            max-width: 50%
        }

        .row-cols-xl-3 > * {
            -ms-flex: 0 0 33.333333%;
            flex: 0 0 33.333333%;
            max-width: 33.333333%
        }

        .row-cols-xl-4 > * {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%
        }

        .row-cols-xl-5 > * {
            -ms-flex: 0 0 20%;
            flex: 0 0 20%;
            max-width: 20%
        }

        .row-cols-xl-6 > * {
            -ms-flex: 0 0 16.666667%;
            flex: 0 0 16.666667%;
            max-width: 16.666667%
        }

    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #000000
    }

    .table td, .table th {
        padding: .40rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6
    }

    .thead-dark td {
        /*padding: .30rem;*/
        padding: .10rem 0 .30rem 0;
    }

    .tbody-light td {
        padding: .20rem .35rem .20rem .30rem;
    }

    .table thead td {
        vertical-align: middle;
        border-bottom: 2px solid #dee2e6
    }

    .table tbody + tbody {
        border-top: 2px solid #000000;
    }

    .table-sm td, .table-sm th {
        padding: .3rem
    }

    .table-bordered {
        border: 1px solid #000000;
    }

    .table-bordered td, .table-bordered th {
        border: 1px solid rgba(0, 0, 0, .3);
    }

    .table-bordered thead td, .table-bordered thead th {
        border-bottom-width: 2px
    }

    .table-borderless tbody + tbody, .table-borderless td, .table-borderless th, .table-borderless thead th {
        border: 0
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, .05)
    }

    .table-hover tbody tr:hover {
        color: #212529;
        background-color: rgba(0, 0, 0, .075)
    }

    .table-primary, .table-primary > td, .table-primary > th {
        background-color: #b8daff
    }

    .table-primary tbody + tbody, .table-primary td, .table-primary th, .table-primary thead th {
        border-color: #7abaff
    }

    .table-hover .table-primary:hover {
        background-color: #9fcdff
    }

    .table-hover .table-primary:hover > td, .table-hover .table-primary:hover > th {
        background-color: #9fcdff
    }

    .table-secondary, .table-secondary > td, .table-secondary > th {
        background-color: #d6d8db
    }

    .table-secondary tbody + tbody, .table-secondary td, .table-secondary th, .table-secondary thead th {
        border-color: #b3b7bb
    }

    .table-hover .table-secondary:hover {
        background-color: #c8cbcf
    }

    .table-hover .table-secondary:hover > td, .table-hover .table-secondary:hover > th {
        background-color: #c8cbcf
    }

    .table-success, .table-success > td, .table-success > th {
        background-color: #c3e6cb
    }

    .table-success tbody + tbody, .table-success td, .table-success th, .table-success thead th {
        border-color: #8fd19e
    }

    .table-hover .table-success:hover {
        background-color: #b1dfbb
    }

    .table-hover .table-success:hover > td, .table-hover .table-success:hover > th {
        background-color: #b1dfbb
    }

    .table-info, .table-info > td, .table-info > th {
        background-color: #bee5eb
    }

    .table-info tbody + tbody, .table-info td, .table-info th, .table-info thead th {
        border-color: #86cfda
    }

    .table-hover .table-info:hover {
        background-color: #abdde5
    }

    .table-hover .table-info:hover > td, .table-hover .table-info:hover > th {
        background-color: #abdde5
    }

    .table-warning, .table-warning > td, .table-warning > th {
        background-color: #ffeeba
    }

    .table-warning tbody + tbody, .table-warning td, .table-warning th, .table-warning thead th {
        border-color: #ffdf7e
    }

    .table-hover .table-warning:hover {
        background-color: #ffe8a1
    }

    .table-hover .table-warning:hover > td, .table-hover .table-warning:hover > th {
        background-color: #ffe8a1
    }

    .table-danger, .table-danger > td, .table-danger > th {
        background-color: #f5c6cb
    }

    .table-danger tbody + tbody, .table-danger td, .table-danger th, .table-danger thead th {
        border-color: #ed969e
    }

    .table-hover .table-danger:hover {
        background-color: #f1b0b7
    }

    .table-hover .table-danger:hover > td, .table-hover .table-danger:hover > th {
        background-color: #f1b0b7
    }

    .table-light, .table-light > td, .table-light > th {
        background-color: #fdfdfe
    }

    .table-light tbody + tbody, .table-light td, .table-light th, .table-light thead th {
        border-color: #fbfcfc
    }

    .table-hover .table-light:hover {
        background-color: #ececf6
    }

    .table-hover .table-light:hover > td, .table-hover .table-light:hover > th {
        background-color: #ececf6
    }

    .table-dark, .table-dark > td, .table-dark > th {
        background-color: #c6c8ca
    }

    .table-dark tbody + tbody, .table-dark td, .table-dark th, .table-dark thead th {
        border-color: #000000;
    }

    .table-hover .table-dark:hover {
        background-color: #b9bbbe
    }

    .table-hover .table-dark:hover > td, .table-hover .table-dark:hover > th {
        background-color: #b9bbbe
    }

    .table-active, .table-active > td, .table-active > th {
        background-color: rgba(0, 0, 0, .075)
    }

    .table-hover .table-active:hover {
        background-color: rgba(0, 0, 0, .075)
    }

    .table-hover .table-active:hover > td, .table-hover .table-active:hover > th {
        background-color: rgba(0, 0, 0, .075)
    }

    .table .thead-dark td {
        color: #fff;
        background-color: #000000;
        border: 0;
    }

    .table .tbody-light .tbody-note td {
        color: #000000;
        background-color: #ffffff;
        border: 1px solid rgba(0, 0, 0, .7);
    }

    .table .thead-light th {
        color: #000000;
        background-color: #000000;
        border-color: #000000;
    }

    .table-dark {
        color: #fff;
        background-color: #000000
    }

    .table-dark td, .table-dark th, .table-dark thead th {
        border-color: #000000
    }

    .table-dark.table-bordered {
        border: 0
    }

    .table-dark.table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, .05)
    }

    .table-dark.table-hover tbody tr:hover {
        color: #fff;
        background-color: rgba(255, 255, 255, .075)
    }



    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch
    }

    .table-responsive > .table-bordered {
        border: 0
    }

    /*# sourceMappingURL=bootstrap.min.css.map */

    .page-break {
        page-break-after: always;
    }

    @media (max-width: 800px) {
        #footer {
            /*position: relative;*/
            bottom: 0;
            width: 100%;
            background: #ffffff;;
        }

        .header-line-up {
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .3);
            margin-top: 0;
            /*margin-bottom: 5px;*/
            margin-bottom: 0;
        }
    }

    .upfront-h6 {
        background-color: #000000;
        color: white;
        line-height: 2;
        vertical-align: middle;
        text-align: center
    }

    .line-height-h6 {
        line-height: 2;
        vertical-align: middle;
    }
</style>
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
    <h4 class="center" style="width: 100%">Health Declaration Card</h4>

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
    <div class="clearfix"></div>
    <h4>Covid Information</h4>
    <table class="table table-bordered no-padding" width="100%">
        <tr>
            <td>Has COVID-19 Vaccination</td>
            <td>{!!formatBoolean($declaration->is_vaccinated)!!}</td>
        </tr>

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

@endsection

@section('js')
    <script type="text/javascript">

    </script>
@show