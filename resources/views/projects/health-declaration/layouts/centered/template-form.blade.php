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
        <div class="login-logo">
            {{config('app.name')}}
        </div>
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