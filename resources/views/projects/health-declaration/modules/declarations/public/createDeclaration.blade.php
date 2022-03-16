@extends('projects.health-declaration.layouts.centered.template-form')
<?php
/** @var \App\Mainframe\Modules\Groups\Group $group */
?>

@section('content')

    <h4> Health Declaration Form </h4>

    <div class="card-body">

        {{ Form::open(['route' => 'healthDeclaration-store','class'=>"form", 'name'=>'healthDeclaration-form']) }}

        {{-- <input type="hidden" name="group_ids[]" value="{{$group->id}}"> --}}
        @include('form.text',['var'=>['name'=>'passenger_name','label'=>'Passenger Name', 'div'=>'col-sm-12']])
        @include('form.number',['var'=>['name'=>'mobile_no','label'=>'Phone No', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'email','label'=>'Email', 'div'=>'col-sm-4']])
        @include('form.date',['var'=>['name'=>'passenger_dob','label'=>'Date of Birth', 'div'=>'col-sm-4']])
        @include('form.select-array',['var'=>['name'=>'gender','label'=>'Gender', 'div'=>'col-sm-4','options'=>(\App\Declaration::$genderTypes)]])
        @include('form.select-model',['var'=>['name'=>'origin_country_id','label'=>'Country Of Origin','div'=>'col-sm-4','name_field'=>'name', 'model'=>\App\Country::class,]])
        @include('form.text',['var'=>['name'=>'nationality','label'=>'Nationality', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'passport_no','label'=>'Passport No', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'flight_no','label'=>'Flight No/Vehicle No', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'seat_no','label'=>'Seat No', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'port_entry','label'=>'Port of Embarkation/Entry', 'div'=>'col-sm-4']])
        {{--        @include('form.select-model',['var'=>['name'=>'destination_country_id','label'=>'Country Of Origin','div'=>'col-sm-4','name_field'=>'name', 'model'=>\App\Country::class,]])--}}
        @include('form.date',['var'=>['name'=>'arrival_date','label'=>'Date of Arrival', 'div'=>'col-sm-4']])
        @include('form.date',['var'=>['name'=>'departure_date','label'=>'Date of Departure', 'div'=>'col-sm-4']])
        @include('form.select-model-multiple',['var'=>['name'=>'visited_country_ids','label'=>'Countries visited within last 2 weeks(if any)','div'=>'col-sm-6','name_field'=>'name', 'model'=>\App\Country::class,]])
        <div class="clearfix"></div>
        <h4>Bangladesh Address</h4>
        @include('form.custom.division-district-upazila',['var'=>['prefixIdentifier'=>'','labelIdentifier'=>'']])
        @include('form.text',['var'=>['name'=>'village','label'=>'Village/Area', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'road','label'=>'Road', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'house','label'=>'House', 'div'=>'col-sm-4']])
        <div class="clearfix"></div>
        <h4>Symptoms</h4>
        @include('form.select-array',['var'=>['name'=>'has_sore_throat','label'=>'Sore Throat', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'has_fever','label'=>'Fever', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'has_headache','label'=>'Headache', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'has_tiredness','label'=>'Tiredness', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'has_cough','label'=>'Cough', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'has_shortness_of_breath','label'=>'Shortness of Breath', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'has_loss_of_taste_or_smell','label'=>'Sudden loss of taste or smell', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        <div class="clearfix"></div>
        @include('form.select-array',['var'=>['name'=>'has_covid','label'=>'Have you or any member of your group travelling with you, had a positive COVID-19 test in the last 3 days?', 'div'=>'col-sm-6','options'=>(\App\Declaration::$yesNo)]])
        @include('form.date',['var'=>['name'=>'first_vaccine_date','label'=>'Date of 1st Dose', 'div'=>'col-sm-3']])
        @include('form.date',['var'=>['name'=>'second_vaccine_date','label'=>'Date of 2nd Dose', 'div'=>'col-sm-3']])
        <div class="clearfix"></div>
        <div id="declaration">
            <h5>Declaration</h5>
            @include('form.checkbox',['var'=>['name'=>'declaration_check']])
            <div class="clearfix"></div>
            <h5>I, hereby, declare that the information provided in this form true and valid to the best of my knowledge.</h5>
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
        $('select[id=origin_country_id],select[id=visited_country_ids]').select2();
        $('#divSubmit').hide();
        $("#declaration_check").change(function () {
            $('#divSubmit').hide();
            if (this.checked) {
                $('#divSubmit').show();
            }
        });
    </script>
@endsection
