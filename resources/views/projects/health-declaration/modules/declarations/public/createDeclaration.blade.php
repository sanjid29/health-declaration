@extends('projects.health-declaration.layouts.centered.template-form')
<?php
/** @var \App\Mainframe\Modules\Groups\Group $group */
?>


@section('content')

    <div class="card-body">

        {{ Form::open(['route' => 'healthDeclaration-store','class'=>"form", 'name'=>'healthDeclaration-form', 'id'=>'healthDeclaration-form']) }}
        <h4>Personal Information</h4>
        @include('form.text',['var'=>['name'=>'passenger_name','label'=>'Passenger Name/যাত্রীর নাম', 'div'=>'col-sm-12']])
        @include('form.number',['var'=>['name'=>'mobile_no','label'=>'Phone No/মোবাইল নং', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'email','label'=>'Email/ইমেইল', 'div'=>'col-sm-4']])
        @include('form.select-array',['var'=>['name'=>'gender','label'=>'Gender/লিঙ্গ', 'div'=>'col-sm-4','options'=>(\App\Declaration::$genderTypes)]])
        @include('form.date',['var'=>['name'=>'passenger_dob','label'=>'Date of Birth/ জন্ম তারিখ', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'nationality','label'=>'Nationality/জাতীয়তা', 'div'=>'col-sm-4']])
        @include('form.select-model',['var'=>['name'=>'origin_country_id','label'=>'Country Of Origin/মাত্রিভূমি','div'=>'col-sm-4','name_field'=>'name', 'model'=>\App\Country::class,]])

        <div class="clearfix"></div>
        <h4>Travel Information</h4>
        @include('form.text',['var'=>['name'=>'passport_no','label'=>'Passport No/পাসপোর্ট নং', 'div'=>'col-sm-4']])
        @include('form.select-array',['var'=>['name'=>'mode_of_transport','label'=>'Mode Of Transportation/পরিবহন রীতি', 'div'=>'col-sm-4','options'=>(\App\Declaration::$modeOfTransportTypes)]])
        @include('form.text',['var'=>['name'=>'flight_no','label'=>'(Flight No/Vehicle No)/(ফ্লাইট নং/যানবাহন নং)', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'seat_no','label'=>'Seat No/আসন নং', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'port_entry','label'=>'(Port of Embarkation/Entry)/(যাত্রা/প্রবেশের বন্দর)', 'div'=>'col-sm-4']])
        @include('form.select-model',['var'=>['name'=>'journey_from_country_id','label'=>'Journey Started From/যে দেশ থেকে যাত্রা শুরু করেছেন','div'=>'col-sm-4','name_field'=>'name', 'model'=>\App\Country::class,]])
        @include('form.date',['var'=>['name'=>'arrival_date','label'=>'Date of Arrival/আগমনের তারিখ', 'div'=>'col-sm-4']])
        @include('form.date',['var'=>['name'=>'departure_date','label'=>'Date of Departure/ প্রস্থানের তারিখ', 'div'=>'col-sm-4']])
        @include('form.select-model-multiple',['var'=>['name'=>'visited_country_ids','label'=>'Countries visited within last 2 weeks(if any)/গত ২ সপ্তাহে যে সমস্ত দেশ ভ্রমন করেছেন(যদি কোন)','div'=>'col-sm-6','name_field'=>'name', 'model'=>\App\Country::class,]])
        <div class="clearfix"></div>
        <h4>Where are you staying in Bangladesh?</h4>
        @include('form.custom.division-district-upazila',['var'=>['prefixIdentifier'=>'','labelIdentifier'=>'']])
        @include('form.text',['var'=>['name'=>'village','label'=>'Area/Village', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'road','label'=>'Road', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'house','label'=>'House', 'div'=>'col-sm-4']])
        <div class="clearfix"></div>
        <h4>Symptoms</h4>
        @include('form.select-array',['var'=>['name'=>'has_sore_throat','label'=>'Sore Throat/গলাব্যাথা', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'has_fever','label'=>'Fever/জ্বর', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'has_headache','label'=>'Headache/মাথাব্যাথা', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'has_tiredness','label'=>'Tiredness/ক্লান্তি', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'has_cough','label'=>'Cough/কাশি', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'has_shortness_of_breath','label'=>'Shortness of Breath/শ্বাসকষ্ট', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'has_loss_of_taste_or_smell','label'=>'Sudden loss of taste or smell/ইদানিং স্বাদ কিংবা গন্ধ না পাওয়া', 'div'=>'col-sm-6','options'=>(\App\Declaration::$yesNo)]])
        <div class="clearfix"></div>
        <h4>Covid Information</h4>
        @include('form.select-array',['var'=>['name'=>'has_covid','label'=>'Have you or any member of your group travelling with you, had a positive COVID-19 test in the last 3 days? /আপনি কিংবা আপনার ভ্রমনসঙ্গীদের মধ্যে কেউ গত তিন দিনের মধ্যে কোভিড-১৯ টেস্ট পজেটিভ ছিল কি না?', 'div'=>'col-sm-10','options'=>(\App\Declaration::$yesNo)]])
        <div class="clearfix"></div>
        <h6>If yes provide the covid report with the form/কোভিড-১৯ টেস্ট পজেটিভ থাকলে এই ফরমের সাথে রিপোর্টটি জমা দিন</h6>
        <div class="clearfix"></div>
        @include('form.select-array',['var'=>['name'=>'was_covid_affected','label'=>'Have you had a positive COVID-19 test? /আপনি কোভিড-১৯ টেস্ট পজেটিভ ছিল কি?', 'div'=>'col-sm-6','options'=>(\App\Declaration::$yesNo)]])
        @include('form.date',['var'=>['name'=>'last_covid_affected_on','label'=>'Date of last Covid Positive Test/ সর্বশেষ কোভিড-১৯ পজেটিভ টেস্ট তারিখ', 'div'=>'col-sm-6']])
        <div class="clearfix"></div>
        <h6>Covid Vaccine Information/আপনি কিংবা আপনার ভ্রমনসঙ্গীদের কোভিড-১৯ ভ্যাক্সিন তথ্য</h6>
        <div class="clearfix"></div>
        @include('form.select-model',['var'=>['name'=>'primary_vaccine_id','label'=>'Vaccine\টিকা','div'=>'col-sm-4','name_field'=>'name', 'model'=>\App\Vaccine::class,]])
        @include('form.date',['var'=>['name'=>'first_vaccine_date','label'=>'Date of 1st Dose/১ম ডোজ নেয়ার তারিখ', 'div'=>'col-sm-3']])
        @include('form.date',['var'=>['name'=>'second_vaccine_date','label'=>'Date of 2nd Dose/২য় ডোজ নেয়ার তারিখ', 'div'=>'col-sm-3']])
        @include('form.select-model',['var'=>['name'=>'secondary_vaccine_id','label'=>'Third Dose Vaccine\তৃতীয় ডোজ টিকা','div'=>'col-sm-4','name_field'=>'name', 'model'=>\App\Vaccine::class,]])
        @include('form.date',['var'=>['name'=>'third_vaccine_date','label'=>'Date of 3rd Dose/৩য় ডোজ নেয়ার তারিখ', 'div'=>'col-sm-3']])
        <div class="clearfix"></div>
        <h6>Show Covid Vaccine Certificate and give one photocopy/ টিকার কার্ডটি দেখান, এবং ফটোকপি জমা দিন</h6>
        <div class="clearfix"></div>
        <div id="declaration">
            <h5>Declaration</h5>
            @include('form.checkbox',['var'=>['name'=>'declaration_check']])
            <div class="clearfix"></div>
            <h5>I, hereby, declare that the information provided in this form true and valid to the best of my knowledge./
                আমি এই মর্মে ঘোষণা করছি আমার জানামতে এ সকল তহ্য সত্য।</h5>
        </div>
        <div class="form-group row mb-0" id="divSubmit">
            <div class="col-md-12">
                <button id="declarationSubmitButton" type="submit" class="btn btn-primary btn-block lb-bg">Submit</button>
            </div>
        </div>

        {{ Form::close() }}

    </div>

@endsection
@section('js')
    <script type="text/javascript">
        $('select[id=origin_country_id],select[id=primary_vaccine_id],select[id=secondary_vaccine_id],select[id=journey_from_country_id],select[id=visited_country_ids]').select2();
        $('#divSubmit').hide();
        $("#declaration_check").change(function () {
            $('#divSubmit').hide();
            if (this.checked) {
                $('#divSubmit').show();
            }
        });


        $('#healthDeclaration-form').validationEngine({
            prettySelect: true,
            promptPosition: "topLeft",
            scroll: true
        });

        $("#healthDeclaration-form input[name=passenger_name]").addClass('validate[required]');
        $("#healthDeclaration-form input[name=mobile_no]").addClass('validate[required]');
        $("#healthDeclaration-form input[name=email]").addClass('validate[email]');
        $("#healthDeclaration-form select[name=gender]").addClass('validate[required]');
        $("#healthDeclaration-form input[name=nationality]").addClass('validate[required]');
        //$("#healthDeclaration-form input[name=passenger_dob]").addClass('validate[required]');
        $("#healthDeclaration-form select[name=origin_country_id]").addClass('validate[required]');
        $("#healthDeclaration-form input[name=passport_no]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=mode_of_transport]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=journey_from_country_id]").addClass('validate[required]');
        //$("#healthDeclaration-form input[id=arrival_date]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=division_id]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=district_id]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=upazila_id]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=has_sore_throat]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=has_fever]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=has_headache]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=has_tiredness]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=has_cough]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=has_shortness_of_breath]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=has_loss_of_taste_or_smell]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=has_covid]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=was_covid_affected]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=primary_vaccine_id]").addClass('validate[required]');
    </script>
@endsection
