@extends('mainframe.layouts.centered.template')

@section('content')
    <div class="card-body">
        <h4>Please Download Your Declaration Form</h4>
        <h5>Link To Download</h5>
        <a href="{{route('declaration-form')}}" class="btn btn-primary" target="_blank" style="color:white">Create Another</a>
    </div>
@endsection
