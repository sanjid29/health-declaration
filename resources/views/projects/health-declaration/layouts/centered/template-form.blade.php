<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('projects.health-declaration.layouts.default.includes.analytics')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        @section('head-title')
            {{config('app.name')}}
        @show
    </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @section('head')
    @show
    @include('projects.health-declaration.layouts.default.includes.css')
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
</head>
<body class="hold-transition login-page lb-bg">
<div class="container content-wrapper">
    <div class="row">
        <table class="no-border no-padding" width="100%">
            <tr>
                <td width="20%" align="right" style="vertical-align: center">
                    <img src="{{asset('projects/health-declaration/logo/GoB.png')}}" width="60%"/>
                </td>
                <td width="60%" align="center" style="vertical-align: middle">
                    <h3>Government of the People's Republic of Bangladesh</h3>
                    <h3>Ministry of Health & Family Welfare</h3>
                </td>
                <td width="20%" align="left" style="vertical-align: center">
                    <img src="{{asset('projects/health-declaration/logo/dghs.jpg')}}" width="60%"/>
                </td>
            </tr>
        </table>
        <div class="login-logo">
            {{config('app.name')}}
        </div>
    </div>
    <div class="row">
        <h3 align="center" style="color:red !important;padding: 5px;">Health Declaration Form</h3>
    </div>
    <div class="row">
        <div class="col-md-12 ">
            @include('projects.health-declaration.layouts.default.includes.alerts.messages-top')

            @section('content-top')
            @show

            @section('content')
            @show

            @section('content-bottom')
            @show
        </div>
    </div>
    @include('projects.health-declaration.layouts.default.includes.modals.messages')
    @include('projects.health-declaration.layouts.default.includes.modals.delete')
</div>

@include('projects.health-declaration.layouts.default.includes.js')
@section('js')
    {{-- js section   --}}
@show
<script>
    $(function () {
        // $('input').iCheck({
        //     checkboxClass: 'icheckbox_square-blue',
        //     radioClass: 'iradio_square-blue',
        //     increaseArea: '20%' // optional
        // });
    });
</script>
</body>
</html>