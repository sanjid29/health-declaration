@extends('projects.health-declaration.layouts.centered.template-form')

@section('content')
    <div class="card-body">
        <h4>Health Declaration has been created successfully. </h4>
        @if($declaration->decision=="You are Allowed to Travel")
            <h4 style="color:green !important;padding: 5px; font-weight: 600;">You are Allowed to Travel &#10003</h4>
            <h4 style="color:green !important;padding: 5px; font-weight: 600;">Please download/print the pdf by clicking below</h4>
            <h4 style="color:green !important;padding: 5px; font-weight: 600;">নিচে ক্লিক করে পিডিএফ ডাউনলোড/প্রিন্ট করুন</h4>
            <div align="left">
                <a class="btn btn-primary" href="{{route('healthDeclaration-pdf',$declaration->uuid)}}" target="_blank" style="color:white">Download Form</a>
                <a class="btn btn-primary" href="{{route('healthDeclaration-print',$declaration->uuid)}}" target="_blank" style="color:white">Print Form</a>
            </div>
            <h4 style="color:green !important;padding: 5px; font-weight: 600;">Please carry all necessary documents (Vaccination Certificate/Covid-19 Test Result) with this card.</h4>
            <h4 style="color:green !important;padding: 5px; font-weight: 600;">অনুগ্রহ করে এই কার্ডের সাথে সমস্ত প্রয়োজনীয় কাগজপত্র (টিকাকরণ শংসাপত্র/কোভিড-১৯ পরীক্ষার ফলাফল) সঙ্গে রাখুন।</h4>

        @else
            <h4 style="color:red !important;padding: 5px; font-weight: 600;">You are Not Allowed to Travel &#10060</h4>

        @endif
    </div>
@endsection
