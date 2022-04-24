@extends('projects.health-declaration.layouts.centered.template-form')
<?php
/** @var \App\Mainframe\Modules\Groups\Group $group */
    //
    // ফর্মটি পূরণ করার সময় কোনো সমস্যা হলে বা কোনো কিছু জানার থাকলে 017******** নাম্বারে ফোন করুন।
?>


@section('content')

    <h4>
        All information shall be kept confidential and will be used for Public Health purposes. The Ministry of Health & Family Welfare, Government of the
        People’s Republic of Bangladesh mandatorily requires all the passengers entering through ground crossings, by seaport, or by the airport to fill in this
        form as a part of health screening at the port of entry.
        <br>
        If you face any difficulty filling up the form, please call 01769954137.
    </h4>
    <h4>
        সকল তথ্যের গোপনীয়তা রক্ষা করা হবে এবং জনস্বাস্থ্য সংক্রান্ত কাজের জন্য ব্যবহৃত হবে। গণপ্রজাতন্ত্রী বাংলাদেশ সরকারের করোনাভাইরাস (কোভিড-১৯) সংক্রমণ
        স্ক্রিনিং কার্যক্রমের অংশ হিসাবে দেশের স্থল/নৌ/ বিমানবন্দর সমূহের মাধ্যমে দেশে প্রবেশকারীদের নিচের তথ্যগুলি পূরণ করতে হবে।
        <br>
        ফর্মটি পূরণ করার সময় কোনো সমস্যা হলে বা কোনো কিছু জানার থাকলে ০১৭৬৯৯৫৪১৩৭ নাম্বারে ফোন করুন।
    </h4>
    <div class="card-body">

        {{ Form::open(['route' => 'healthDeclaration-store','class'=>"form", 'name'=>'healthDeclaration-form', 'id'=>'healthDeclaration-form']) }}
        <h4>Personal Information</h4>
        @include('form.text',['var'=>['name'=>'passenger_name','label'=>'Passenger Name/যাত্রীর নাম *', 'div'=>'col-sm-12']])
        @include('form.text',['var'=>['name'=>'passport_no','label'=>'Passport No/পাসপোর্ট নম্বর *', 'div'=>'col-sm-4']])
        @include('form.select-array',['var'=>['name'=>'gender','label'=>'Gender/লিঙ্গ*', 'div'=>'col-sm-4','options'=>(\App\Declaration::$genderTypes)]])
        @include('form.date',['var'=>['name'=>'passenger_dob','label'=>'Date of Birth/ জন্ম তারিখ*', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'nationality','label'=>'Nationality/জাতীয়তা', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'email','label'=>'Email/ইমেইল', 'div'=>'col-sm-4']])
        <div class="clearfix"></div>
        @include('form.select-model',['var'=>['name'=>'country_code_mobile_number','label'=>'Country Code *','div'=>'col-sm-4','name_field'=>'calling_code_with_country','value_field'=>'calling_code', 'model'=>\App\Country::class,]])
        @include('form.number',['var'=>['name'=>'mobile_no','label'=>'Phone No/মোবাইল নম্বর *', 'div'=>'col-sm-4']])
        <div class="clearfix"></div>
        <h4>Travel Information</h4>
        @include('form.select-array',['var'=>['name'=>'mode_of_transport','label'=>'Mode of Travel/পরিবহনের ধরণ *', 'div'=>'col-sm-4','options'=>(\App\Declaration::$modeOfTransportTypes)]])
        @include('form.text',['var'=>['name'=>'flight_no','label'=>'(Flight No/Vehicle No)/(ফ্লাইট নম্বর/যানবাহন নম্বর)', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'seat_no','label'=>'Seat No/আসন নম্বর', 'div'=>'col-sm-4']]){{--        @include('form.text',['var'=>['name'=>'port_entry','label'=>'(Port of Embarkation/Entry)/(যাত্রা/প্রবেশের বন্দর)', 'div'=>'col-sm-4']])--}}
        @include('form.select-model',['var'=>['name'=>'journey_from_country_id','label'=>'Country of Origin of Travel/যে দেশ থেকে যাত্রা শুরু করেছেন','div'=>'col-sm-4','name_field'=>'name', 'model'=>\App\Country::class,]])
       <div class="clearfix"></div>
        @include('form.date',['var'=>['name'=>'arrival_date','label'=>'Date of Arrival/আগমনের তারিখ', 'div'=>'col-sm-4']])
        @include('form.datetime',['var'=>['name'=>'start_date','label'=>'Departure Date from Country of Origin of Travel/যাত্রা শুরু তারিখ*', 'div'=>'col-sm-6']])

        @include('form.select-model-multiple',['var'=>['name'=>'visited_country_ids','label'=>'Country visited within last two (02) weeks (if any). / গত দুই (০২) সপ্তাহে যে সমস্ত দেশে ভ্রমণ করেছেন (যদি থাকে)','div'=>'col-sm-8','name_field'=>'name', 'model'=>\App\Country::class,]])
        <div class="clearfix"></div>
        <h4>Where are you staying in Bangladesh?/বাংলাদেশে অবস্থানকালীন ঠিকানা</h4>
        @include('form.select-array',['var'=>['name'=>'address_type','label'=>'(Rural Area/গ্রাম) / (Town/শহর) *', 'div'=>'col-sm-4','options'=>(\App\Declaration::$typeOfAddresses)]])
        <div class="clearfix"></div>
        @include('form.custom.division-district-upazila',['var'=>['prefixIdentifier'=>'','labelIdentifier'=>'']])
        <div id="town">
            @include('form.text',['var'=>['name'=>'city_corporation','label'=>'City Corporation / Municipality / সিটি কর্পোরেশন', 'div'=>'col-sm-4']])
            @include('form.text',['var'=>['name'=>'thana','label'=>'Thana/থানা', 'div'=>'col-sm-4']])
            @include('form.text',['var'=>['name'=>'ward','label'=>'Ward/ওয়ার্ড', 'div'=>'col-sm-4']])
            @include('form.text',['var'=>['name'=>'area','label'=>'Area/মহল্লা', 'div'=>'col-sm-4']])
        </div>
        <div id="rural">
            @include('form.text',['var'=>['name'=>'union','label'=>'Union/ইউনিয়ন', 'div'=>'col-sm-4']])
            @include('form.text',['var'=>['name'=>'village','label'=>'Village/গ্রাম', 'div'=>'col-sm-4']])
        </div>
        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'road','label'=>'Road/রাস্তা', 'div'=>'col-sm-4']])
        @include('form.text',['var'=>['name'=>'house','label'=>'House/বাড়ী', 'div'=>'col-sm-4']])
        @include('form.number',['var'=>['name'=>'local_contact_no','label'=>'Local Phone No/স্থানীয় মোবাইল নম্বর *', 'div'=>'col-sm-4']])

        <div class="clearfix"></div>
        <h4>Symptoms</h4>
        @include('form.select-array',['var'=>['name'=>'have_covid_symptoms','label'=>'Do you have any symptoms ( Fever, Cough, Sore throat, Shortness of Breath, Loss of smell or taste)  of COVID-19? / আপনার কি কোভিড-১৯ এর কোন উপসর্গ (জ্বর,  কাশি, গলাব্যাথা, শ্বাসকষ্ট, স্বাদ বা গন্ধ না পাওয়া) আছে? *', 'div'=>'col-sm-8','options'=>(\App\Declaration::$yesNo)]])
        <div class="clearfix"></div>
        <h4>Covid 19 Information</h4>
        <div class="clearfix"></div>
        <h6>Information of Covid-19 Vaccination/আপনার কোভিড-১৯ টিকার তথ্য</h6>
        <div class="clearfix"></div>
        @include('form.select-array',['var'=>['name'=>'is_vaccinated','label'=>'Have you taken Vaccination for COVID-19? /আপনি কি কোভিড-১৯ এর জন্য টিকা নিয়েছেন? *', 'div'=>'col-sm-6','options'=>(\App\Declaration::$yesNo)]])
        <div class="clearfix"></div>
        <div id="vaccination-info">
            <h6>If Yes, show Covid-19 Vaccination Certificate and submit one photocopy/ টিকার কার্ডটি দেখান, এবং ফটোকপি জমা দিন</h6>
            <div class="clearfix"></div>
            @include('form.select-model',['var'=>['name'=>'primary_vaccine_id','label'=>'Vaccine\টিকা','div'=>'col-sm-4','name_field'=>'name', 'model'=>\App\Vaccine::class,]])
            @include('form.date',['var'=>['name'=>'first_vaccine_date','label'=>'Date of 1st Dose/১ম ডোজ নেয়ার তারিখ *', 'div'=>'col-sm-3']])
            <div id="second_vaccine">
                @include('form.date',['var'=>['name'=>'second_vaccine_date','label'=>'Date of 2nd Dose/২য় ডোজ নেয়ার তারিখ', 'div'=>'col-sm-3']])
            </div>
           <div class="clearfix"></div>
        </div>
        <div id="rt-pcr-field">
            <div class="clearfix"></div>
            @include('form.select-array',['var'=>['name'=>'is_rt_pcr_negative','label'=>'Do you have Covid19 rt-PCR negative report within 72 hours of Travel? /আপনার কি ৭২ ঘন্টা মেয়াদী কোভিড-১৯ আরটিপিসিআর নেগেটিভ সনদ রয়েছে? *', 'div'=>'col-sm-10','options'=>(\App\Declaration::$yesNo)]])
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

        {{ Form::close() }}

    </div>

@endsection
@section('js')
    <script type="text/javascript">
        $('select[id=country_code_mobile_number],select[id=primary_vaccine_id],select[id=secondary_vaccine_id],select[id=journey_from_country_id],select[id=visited_country_ids]').select2();
        $('#divSubmit').hide();
        $("#declaration_check").change(function () {
            $('#divSubmit').hide();
            if (this.checked) {
                $('#divSubmit').show();
            }
        });
        showVaccineSecondDose();
        showVaccinationInfo();
        fieldsBasedOnAddress();
        $('#healthDeclaration-form').validationEngine({
            prettySelect: true,
            promptPosition: "topLeft",
            scroll: true
        });

        $("#healthDeclaration-form input[name=passenger_name]").addClass('validate[required]');
        $("#healthDeclaration-form input[name=passport_no]").addClass('validate[required]');
        $("#healthDeclaration-form select[name=country_code_mobile_number]").addClass('validate[required]');
        $("#healthDeclaration-form input[name=mobile_no]").addClass('validate[required]');
        $("#healthDeclaration-form input[name=email]").addClass('validate[email]');
        $("#healthDeclaration-form select[name=gender]").addClass('validate[required]');
        //$("#healthDeclaration-form input[name=passenger_dob]").addClass('validate[required]');
        $("#healthDeclaration-form input[id=local_contact_no]").addClass('validate[required]');
        //$("#healthDeclaration-form input[name=start_date]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=mode_of_transport]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=journey_from_country_id]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=division_id]").addClass('validate[required]');
        // $("#healthDeclaration-form select[id=district_id]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=have_covid_symptoms]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=is_vaccinated]").addClass('validate[required]');


        function viewVaccineInfo() {
            $('#rt-pcr-field').hide();
            $('#vaccination-info').hide();
            let isVaccinated = $('select[name=is_vaccinated]').val();
            if (isVaccinated === '1') {
                $('#vaccination-info').show();
                $('#rt-pcr-field').hide();
                $("#healthDeclaration-form select[id=primary_vaccine_id]").addClass('validate[required]');
                $("#healthDeclaration-form select[id=is_rt_pcr_negative]").removeClass('validate[required]');

            } else if (isVaccinated === '0') {
                $('#rt-pcr-field').show();
                $('#vaccination-info').hide();
                $("#healthDeclaration-form select[id=primary_vaccine_id]").removeClass('validate[required]');
                $("#healthDeclaration-form select[id=is_rt_pcr_negative]").addClass('validate[required]');

            }
        }

        function showVaccinationInfo() {
            viewVaccineInfo();
            $('select[name=is_vaccinated]').change(viewVaccineInfo);
        }

        function showVaccineSecondDose(){
            $('select[name=primary_vaccine_id]').change(function (){
                $('#second_vaccine').show();
               if($('select[name=primary_vaccine_id]').val()==='7'){
                   $('#second_vaccine').hide();
               };
            });
        }

        function fieldsBasedOnAddress() {
            showFieldsBasedOnAddress();
            $('select[name=address_type]').change(showFieldsBasedOnAddress);
        }

        function showFieldsBasedOnAddress() {
            $('#town').hide();
            $('#rural').hide();
            let addressType = $('select[name=address_type]').val();
            if (addressType === 'rural') {
                $('#rural').show();
                $('#town').hide();

            } else if (addressType === 'town') {
                $('#town').show();
                $('#rural').hide();
            }
        }

    </script>
@endsection
