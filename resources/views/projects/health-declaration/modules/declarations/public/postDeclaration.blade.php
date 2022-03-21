@extends('projects.health-declaration.layouts.centered.template-form')

@section('content')
    <div class="card-body">
       <h4>Health Declaration has been created successfully</h4>
        <h4>You can view the pdf by clicking below</h4>
        <div align="left">
            <a class="btn btn-primary" href="{{route('healthDeclaration-print',$declaration->id)}}" target="_blank" style="color:white">View PDF</a>
        </div>
        <h4>You can download the pdf by clicking below</h4>
        <div align="left">
            <a class="btn btn-primary" href="{{route('healthDeclaration-pdf',$declaration->id)}}" target="_blank" style="color:white">Download PDF</a>
        </div>
    </div>
@endsection
