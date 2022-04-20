@extends('projects.health-declaration.layouts.centered.template-form')

@section('content')
    <div class="card-body">
        <h4>Health Declaration has been created successfully. An email has been sent to your email address</h4>
        @if($declaration->decision=="You are Allowed to Travel")
            <h4 style="color:green">You are Allowed to Travel</h4>
            <h4 style="color:green">You can download/print the pdf by clicking below</h4>
            <div align="left">
                <a class="btn btn-primary" href="{{route('healthDeclaration-pdf',$declaration->id)}}" target="_blank" style="color:white">Download Form</a>
                <a class="btn btn-primary" href="{{route('healthDeclaration-print',$declaration->id)}}" target="_blank" style="color:white">Print Form</a>
            </div>

        @else
            <h4 style="color:red">You are Not Allowed to Travel</h4>
        @endif
    </div>
@endsection
