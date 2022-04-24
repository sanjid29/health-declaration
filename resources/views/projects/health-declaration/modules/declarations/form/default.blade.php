@extends('projects.health-declaration.layouts.module.form.template')
<?php
/**
 * @var \App\Module $module
 * @var \App\User $user
 * @var string $formState create|edit
 * @var array $formConfig
 * @var string $uuid Only available for create
 * @var bool $editable
 * @var array $immutables
 * @var \App\Declaration $element
 * @var \App\Declaration $declaration
 * @var \App\Tenant $tenant
 * @var \App\Projects\HealthDeclaration\Modules\Declarations\DeclarationViewProcessor $view
 */
$declaration = $element;
?>
@section('content-top')

    <a class="btn btn-primary" href="{{route('healthDeclaration-print',$declaration->id)}}" target="_blank" style="color:white">View PDF</a>
    <a class="btn btn-primary" href="{{route('healthDeclaration-pdf',$declaration->id)}}" target="_blank" style="color:white">Download Form</a>

@endsection

@section('content')
    <div class="col-md-12 no-padding">
        @if(($formState == 'create'))
            {{ Form::open($formConfig) }} <input name="uuid" type="hidden" value="{{$uuid}}"/>
        @elseif($formState == 'edit')
            {{ Form::model($element, $formConfig)}}
        @endif

        {{---------------|  Form input start |-----------------------}}
            <h4>Personal Information</h4>
            @include('form.text',['var'=>['name'=>'passenger_name','label'=>'Passenger Name/যাত্রীর নাম', 'div'=>'col-sm-12']])
            @include('form.text',['var'=>['name'=>'passport_no','label'=>'Passport No/পাসপোর্ট নম্বর', 'div'=>'col-sm-4']])
            @include('form.select-array',['var'=>['name'=>'gender','label'=>'Gender/লিঙ্গ', 'div'=>'col-sm-4','options'=>(\App\Declaration::$genderTypes)]])
            @include('form.date',['var'=>['name'=>'passenger_dob','label'=>'Date of Birth/ জন্ম তারিখ', 'div'=>'col-sm-4']])
            @include('form.text',['var'=>['name'=>'nationality','label'=>'Nationality/জাতীয়তা', 'div'=>'col-sm-4']])
            @include('form.text',['var'=>['name'=>'email','label'=>'Email/ইমেইল', 'div'=>'col-sm-4']])
            <div class="clearfix"></div>
            @include('form.select-model',['var'=>['name'=>'country_code_mobile_number','label'=>'Country Code','div'=>'col-sm-4','name_field'=>'name','value_field'=>'calling_code', 'model'=>\App\Country::class,]])
            @if(isset($element))
            <h6>Country Code : {{$element->country_code_mobile_number}}</h6>
            @endif
            @include('form.number',['var'=>['name'=>'mobile_no','label'=>'Phone No (With Country Code)/মোবাইল নম্বর', 'div'=>'col-sm-4']])
            <div class="clearfix"></div>
            <h4>Travel Information</h4>
            @include('form.select-array',['var'=>['name'=>'mode_of_transport','label'=>'Mode of Travel/পরিবহনের ধরণ', 'div'=>'col-sm-4','options'=>(\App\Declaration::$modeOfTransportTypes)]])
            @include('form.text',['var'=>['name'=>'flight_no','label'=>'(Flight No/Vehicle No)/(ফ্লাইট নম্বর/যানবাহন নম্বর)', 'div'=>'col-sm-4']])
            @include('form.text',['var'=>['name'=>'seat_no','label'=>'Seat No/আসন নম্বর', 'div'=>'col-sm-4']]){{--        @include('form.text',['var'=>['name'=>'port_entry','label'=>'(Port of Embarkation/Entry)/(যাত্রা/প্রবেশের বন্দর)', 'div'=>'col-sm-4']])--}}
            @include('form.select-model',['var'=>['name'=>'journey_from_country_id','label'=>'Country of Origin of Travel/যে দেশ থেকে যাত্রা শুরু করেছেন','div'=>'col-sm-4','name_field'=>'name', 'model'=>\App\Country::class,]])
            @include('form.date',['var'=>['name'=>'arrival_date','label'=>'Date of Arrival/আগমনের তারিখ', 'div'=>'col-sm-4']])
            @include('form.select-model-multiple',['var'=>['name'=>'visited_country_ids','label'=>'Country visited with last two (02) week (if any). / গত দুই (০২) সপ্তাহে যে সমস্ত দেশে ভ্রমণ করেছেন (যদি থাকে)','div'=>'col-sm-8','name_field'=>'name', 'model'=>\App\Country::class,]])
            <div class="clearfix"></div>
            <h4>Where are you staying in Bangladesh?/বাংলাদেশে অবস্থানকালীন ঠিকানা</h4>
            @include('form.select-array',['var'=>['name'=>'address_type','label'=>'Rural Area/গ্রাম / Town/শহর', 'div'=>'col-sm-4','options'=>(\App\Declaration::$typeOfAddresses)]])
            <div class="clearfix"></div>
            @include('form.custom.division-district-upazila',['var'=>['prefixIdentifier'=>'','labelIdentifier'=>'']])
            <div id="town">
                @include('form.text',['var'=>['name'=>'city_corporation','label'=>'City Corporation/ইউনিয়ন', 'div'=>'col-sm-4']])
                @include('form.text',['var'=>['name'=>'thana','label'=>'Thana/ওয়ার্ড', 'div'=>'col-sm-4']])
                @include('form.text',['var'=>['name'=>'ward','label'=>'Ward/ওয়ার্ড', 'div'=>'col-sm-4']])
                @include('form.text',['var'=>['name'=>'area','label'=>'Area/মহল্লা', 'div'=>'col-sm-4']])
            </div>
            <div id="rural">
                @include('form.text',['var'=>['name'=>'union','label'=>'Union/ইউনিয়ন', 'div'=>'col-sm-4']])
                @include('form.text',['var'=>['name'=>'village','label'=>'Village/গ্রাম', 'div'=>'col-sm-4']])
            </div>
            <div class="clearfix"></div>
            @include('form.text',['var'=>['name'=>'road','label'=>'Road', 'div'=>'col-sm-4']])
            @include('form.text',['var'=>['name'=>'house','label'=>'House/বাড়ী', 'div'=>'col-sm-4']])
            @include('form.number',['var'=>['name'=>'local_contact_no','label'=>'Local Phone No/স্থানীয় মোবাইল নম্বর *', 'div'=>'col-sm-4']])

            <div class="clearfix"></div>
            <h4>Symptoms</h4>
            @include('form.select-array',['var'=>['name'=>'have_covid_symptoms','label'=>'Do you have any symptoms ( Fever, Cough, Sore throat, Shortness of Breath, Loss of smell or taste)  of COVID-19? / আপনার কি কোভিড-১৯ এর কোন উপসর্গ (জ্বর,  কাশি, গলাব্যাথা, শ্বাসকষ্ট, স্বাদ বা গন্ধ না পাওয়া) আছে?', 'div'=>'col-sm-8','options'=>(\App\Declaration::$yesNo)]])
            <div class="clearfix"></div>
            <h4>Covid 19 Information</h4>
            <div class="clearfix"></div>
            <h6>Information of Covid-19 Vaccination/আপনার কোভিড-১৯ টিকার তথ্য</h6>
            <div class="clearfix"></div>
            @include('form.select-array',['var'=>['name'=>'is_vaccinated','label'=>'Have you taken Vaccination for COVID-19? /আপনি কি কোভিড-১৯ এর জন্য টিকা নিয়েছেন?', 'div'=>'col-sm-6','options'=>(\App\Declaration::$yesNo)]])
            <div class="clearfix"></div>
            <div id="vaccination-info">
                <h6>If Yes, show Covid-19 Vaccination Certificate and submit one photocopy/ টিকার কার্ডটি দেখান, এবং ফটোকপি জমা দিন</h6>
                <div class="clearfix"></div>
                @include('form.select-model',['var'=>['name'=>'primary_vaccine_id','label'=>'Vaccine\টিকা','div'=>'col-sm-4','name_field'=>'name', 'model'=>\App\Vaccine::class,]])
                @include('form.date',['var'=>['name'=>'first_vaccine_date','label'=>'Date of 1st Dose/১ম ডোজ নেয়ার তারিখ', 'div'=>'col-sm-3']])
                @include('form.date',['var'=>['name'=>'second_vaccine_date','label'=>'Date of 2nd Dose/২য় ডোজ নেয়ার তারিখ', 'div'=>'col-sm-3']])
                <div class="clearfix"></div>
            </div>
            <div id="rt-pcr-field">
                <div class="clearfix"></div>
                @include('form.select-array',['var'=>['name'=>'is_rt_pcr_negative','label'=>'Do you have Covid19 rt-PCR negative report within 72 hours of Travel? /আপনার কি ৭২ ঘন্টা মেয়াদী কোভিড-১৯ আরটিপিসিআর নেগেটিভ সনদ রয়েছে?', 'div'=>'col-sm-10','options'=>(\App\Declaration::$yesNo)]])
                <div class="clearfix"></div>
                <h6>If Yes, show rt-PCR test result and submit one photocopy/ আরটি-পিসিআর কার্ডটি দেখান, এবং ফটোকপি জমা দিন</h6>
            </div>

            <div class="clearfix"></div>
            <div id="declaration">
                <h5>Declaration</h5>
                @include('form.checkbox',['var'=>['name'=>'declaration_check']])
                <div class="clearfix"></div>
                <h5>I, hereby, declare that the information provided in this form true and valid to the best of my knowledge.
                    Giving false information or hiding truth will the penalized in accordance with the law/
                    আমি এই মর্মে ঘোষণা করছি আমার জানামতে এ সকল তথ্য সত্য।ভুল তথ্য প্রদান বা সঠিক তথ্য গোপন করলে তা আইনত দন্ডনীয় অপরাধ হিসেবে গণ্য করা হবে এবং বিধি
                    মোতাবেক ব্যবস্থা নেওয়া হবে|</h5>
            </div>
            <div class="form-group row mb-0" id="divSubmit">
                <div class="col-md-12">
                    <button id="declarationSubmitButton" type="submit" class="btn btn-primary btn-block lb-bg">Submit</button>
                </div>
            </div>
        @if(user()->isAdmin() || user()->isSuperUser())
            @include('form.textarea',['var'=>['name'=>'decision','label'=>'Decision', 'div'=>'col-sm-12']])
            @include('form.textarea',['var'=>['name'=>'remark','label'=>'Remark', 'div'=>'col-sm-12']])
        @endif
        @include('form.is-active')
        {{---------------|  Form input start |-----------------------}}

        @include('form.action-buttons')
        {{ Form::close() }}
    </div>
@endsection

@section('content-bottom')
    @parent
    {{--    <div class="col-md-6 no-padding-l">--}}
    {{--        <h5>File upload</h5><small>Upload one or more files</small>--}}
    {{--        @include('form.uploads',['var'=>['limit'=>99,'type'=>\App\Upload::TYPE_GENERIC]])--}}
    {{--    </div>--}}
@endsection

@section('js')
    @parent
    @include('projects.health-declaration.modules.declarations.form.js')
@endsection