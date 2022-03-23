@extends('projects.health-declaration.layouts.centered.template-form')

@section('content')
    <div class="card-body">
        <h4>Health Declaration has been created successfully</h4>
        @if($declaration->decision=="You are Allowed to Travel")

            <h4>You can download/print the pdf by clicking below</h4>
            <div align="left">
                <a class="btn btn-primary" href="{{route('healthDeclaration-pdf',$declaration->id)}}" target="_blank" style="color:white">Download Form</a>
                <a class="btn btn-primary" href="{{route('healthDeclaration-print',$declaration->id)}}" target="_blank" style="color:white">Print Form</a>
            </div>

        @else
            <h4>You are Not Allowed to Travel</h4>
        @endif
    </div>
@endsection
