@extends('projects.health-declaration.layouts.email.template')

@section('title')
    Health Declaration of {{$data['declaration']['passenger_name']}}
@endsection

@section('content')

    Dear {{$data['declaration']['passenger_name']}},
    <br>
    <br>
    <h4>{{$data['message']}}</h4>
    <br>
    <br>
    Thank you,

@endsection