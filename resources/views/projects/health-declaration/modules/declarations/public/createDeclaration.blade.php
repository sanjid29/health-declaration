@extends('projects.health-declaration.layouts.centered.template-form')
<?php
/** @var \App\Mainframe\Modules\Groups\Group $group */

// ফর্মটি পূরণ করার সময় কোনো সমস্যা হলে বা কোনো কিছু জানার থাকলে 017******** নাম্বারে ফোন করুন।
?>


@section('content')
    <h4 style="padding: 2px;">
        All information shall be kept confidential and will be used for Public Health purposes. The Ministry of Health & Family Welfare, Government of the
        People’s Republic of Bangladesh mandatory requires all the passengers entering through ground crossings, by seaport, or by the airport to fill in this
        form as a part of health screening at the port of entry.
    </h4>
    <h6 style="color:green !important; font-weight: 600;"> If you face any difficulty filling up the form, please call +8801313791222(WhatsApp),+8801322858249. </h6>
    <h6 style="color:red !important;font-weight: 600;">Form should be filled within 72 hours prior to Departure time.</h6>
    <h6 style="color:red !important;font-weight: 600;">Not Applicable for kids of twelve or less years old.</h6>
    <h6 style="color:red !important;font-weight: 600;">Except for Janssen (Johnson & Johnson), other vaccines must have two doses to be
        considered completed.</h6>
    <h6 style="color:red !important;font-weight: 600;">If Vaccine is not completed, RT-PCR negative form must be filled.</h6>
    <h6 style="color:red !important;font-weight: 600;">Booster Dose is not mandatory.</h6>

    <h4 style="padding: 2px;">
        সকল তথ্যের গোপনীয়তা রক্ষা করা হবে এবং জনস্বাস্থ্য সংক্রান্ত কাজের জন্য ব্যবহৃত হবে। গণপ্রজাতন্ত্রী বাংলাদেশ সরকারের করোনাভাইরাস (কোভিড-১৯) সংক্রমণ
        স্ক্রিনিং কার্যক্রমের অংশ হিসাবে দেশের স্থল/নৌ/ বিমানবন্দর সমূহের মাধ্যমে দেশে প্রবেশকারীদের নিচের তথ্যগুলি পূরণ করতে হবে।
    </h4>

    <h6 style="color:green !important; font-weight: 600;"> ফর্মটি পূরণ করার সময় কোনো সমস্যা হলে বা কোনো কিছু জানার থাকলে +8801313791222(WhatsApp),+8801322858249 নাম্বারে ফোন করুন।</h6>
    <h6 style="color:red !important; font-weight: 600;"> যাত্রা সময়ের 72 ঘন্টার মধ্যে ফর্মটি পূরণ করতে হবে।</h6>
    <h6 style="color:red !important; font-weight: 600;"> বারো বা তার কম বয়সী বাচ্চাদের জন্য প্রযোজ্য নয়।</h6>
    <h6 style="color:red !important; font-weight: 600;"> Janssen (Johnson & Johnson) ব্যতীত, অন্যান্য টিকা সম্পূর্ণ বলে বিবেচনা করার জন্য দুটি ডোজ থাকতে
        হবে।</h6>
    <h6 style="color:red !important; font-weight: 600;"> ভ্যাকসিন সম্পূর্ণ না হলে, RT-PCR নেগেটিভ ফর্ম অবশ্যই পূরণ করতে হবে।</h6>
    <h6 style="color:red !important; font-weight: 600;"> বুস্টার ডোজ বাধ্যতামূলক নয়।</h6>
    <div class="card-body">

        {{ Form::open(['route' => 'healthDeclaration-store','class'=>"form", 'name'=>'healthDeclaration-form', 'id'=>'healthDeclaration-form']) }}
        <h4 style="color:green !important;padding: 5px;">Personal Information / ব্যক্তিগত তথ্য</h4>
        @include('form.select-model',['var'=>['name'=>'journey_from_country_id','label'=>'Country of Origin of Travel/যে দেশ থেকে যাত্রা শুরু করেছেন','div'=>'col-sm-4','name_field'=>'name', 'model'=>\App\Country::class,'params'=>['autocomplete=off']]])
        @include('form.text',['var'=>['name'=>'passenger_name','label'=>'Passenger Name/যাত্রীর নাম', 'div'=>'col-sm-12','params'=>['autocomplete=off']]])
        @include('form.text',['var'=>['name'=>'passport_no','label'=>'Passport No/পাসপোর্ট নম্বর', 'div'=>'col-sm-4','params'=>['autocomplete=off']]])
        @include('form.text',['var'=>['name'=>'nationality','label'=>'Nationality/জাতীয়তা', 'div'=>'col-sm-4','params'=>['autocomplete=off']]])
        @include('form.select-array',['var'=>['name'=>'gender','label'=>'Gender/লিঙ্গ', 'div'=>'col-sm-4','options'=>(\App\Declaration::$genderTypes),'params'=>['autocomplete=off']]])
        @include('form.select-array',['var'=>['name'=>'age_in_years','label'=>'Age (in Years)/ বয়স', 'div'=>'col-sm-4','options'=>kv(\App\Declaration::$ageGroups),'params'=>['autocomplete=off']]])

        <div class="clearfix"></div>
        <h5>Passenger's Contact Number / যাত্রীর যোগাযোগের নম্বর </h5>
        @include('form.select-model',['var'=>['name'=>'country_code_mobile_number','label'=>'Country Code/কান্ট্রি কোড','div'=>'col-sm-2','name_field'=>'calling_code_with_country','value_field'=>'calling_code', 'model'=>\App\Country::class,'params'=>['autocomplete=off']]])
        @include('form.number',['var'=>['name'=>'mobile_no','label'=>'Mobile No/মোবাইল নম্বর', 'div'=>'col-sm-4','params'=>['autocomplete=off']]])
        <div class="clearfix"></div>
        <h4>Travel Information / ভ্রমণ তথ্য</h4>
        @include('form.select-array',['var'=>['name'=>'mode_of_transport','label'=>'Mode of Travel/পরিবহনের ধরণ', 'div'=>'col-sm-4','options'=>(\App\Declaration::$modeOfTransportTypes)]])
        @include('form.text',['var'=>['name'=>'flight_no','label'=>'(Flight No/Vehicle No)/(ফ্লাইট নম্বর/যানবাহন নম্বর)', 'div'=>'col-sm-4','params'=>['autocomplete=off']]])
        <div class="clearfix"></div>
        @include('form.date',['var'=>['name'=>'arrival_date','label'=>'Date of Arrival/আগমনের তারিখ', 'div'=>'col-sm-4','class'=>'readonly','placeholder'=>'dd-mm-yyyy','params'=>['autocomplete=off']]])
        <div id="departure-date">
            @include('form.select-model-multiple',['var'=>['name'=>'visited_country_ids','label'=>'Country visited within last two (02) weeks (if any). / গত দুই (০২) সপ্তাহে যে সমস্ত দেশে ভ্রমণ করেছেন (যদি থাকে)','div'=>'col-sm-8','name_field'=>'name', 'model'=>\App\Country::class,'params'=>['autocomplete'=>'off']]])
        </div>

        <div class="clearfix"></div>
        <h4>Where are you staying in Bangladesh?/বাংলাদেশে অবস্থানকালীন ঠিকানা</h4>
        <div class="clearfix"></div>
        @include('form.select-model',['var'=>['name'=>'district_id','label'=>'District/জেলা','model'=>\App\District::class,'class'=>'select2','container_class'=>'col-md-4']])
        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'address','label'=>'Address/ঠিকানা', 'div'=>'col-sm-8','params'=>['autocomplete=off']]])
        @include('form.number',['var'=>['name'=>'local_contact_no','label'=>'Local Phone No/স্থানীয় মোবাইল নম্বর', 'div'=>'col-sm-4','placeholder'=>"+880",'params'=>['autocomplete=off']]])
        <div class="clearfix"></div>
        <h4>Symptoms / লক্ষণ</h4>
        <div id="covid-symptoms">
            @include('form.select-array',['var'=>['name'=>'have_covid_symptoms','label'=>'Do you have any symptoms ( Fever, Cough, Sore throat, Shortness of Breath, Loss of smell or taste)  of COVID-19? / আপনার কি কোভিড-১৯ এর কোন উপসর্গ (জ্বর,  কাশি, গলাব্যাথা, শ্বাসকষ্ট, স্বাদ বা গন্ধ না পাওয়া) আছে?', 'div'=>'col-sm-8','options'=>(\App\Declaration::$yesNo)]])
            @include('form.select-array',['var'=>['name'=>'have_monkey_pox_symptoms','label'=>'Do you have any following symptoms ( Fever, Rash, Skin lesion, Pain or Swelling of Lymph node) ? / আপনার কি নিম্নলিখিত উপসর্গ আছে (জ্বর, ফুসকুড়ি, ত্বকের ক্ষত,  লিম্ফ নোড ব্যথা বা ফোলা) ?', 'div'=>'col-sm-8','options'=>(\App\Declaration::$yesNo)]])
        </div>
        <div class="clearfix"></div>
        <h4>Covid 19 Information / কোভিড 19 তথ্য</h4>
        <div class="clearfix"></div>
        <div id="vaccine-info">
            <h6>Information of Covid-19 Vaccination/আপনার কোভিড-১৯ টিকার তথ্য</h6>
            <div class="clearfix"></div>
            @include('form.select-array',['var'=>['name'=>'is_vaccinated','label'=>'Have You Taken Complete Vaccination For COVID-19? /আপনি কি কোভিড-১৯ এর জন্য সম্পূর্ণ টিকা নিয়েছেন?', 'div'=>'col-sm-6','options'=>(\App\Declaration::$yesNo)]])
            <div class="clearfix"></div>
            <h6>If Yes, show Covid-19 Vaccination Card and submit one photocopy/ টিকার কার্ডটি দেখান, এবং ফটোকপি জমা দিন</h6>
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
            <h5>Declaration / ঘোষণা</h5>
            @include('form.checkbox',['var'=>['name'=>'declaration_check']])
            <div class="clearfix"></div>
            <h5>I, hereby, declare that the information provided in this form true and valid to the best of my knowledge.
                Giving false information or hiding truth will the penalized in accordance with the law.
            </h5>

            <h5>আমি এই মর্মে ঘোষণা করছি আমার জানামতে এ সকল তথ্য সত্য।ভুল তথ্য প্রদান বা সঠিক তথ্য গোপন করলে তা আইনত দন্ডনীয়
                অপরাধ হিসেবে গণ্য করা হবে এবং বিধি মোতাবেক ব্যবস্থা নেওয়া হবে|</h5>

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
        $("#declaration_check").on('change', function () {
            $('#divSubmit').hide();
            if (this.checked) {
                $('#divSubmit').show();
            }
        }).trigger('change');
        showVaccineSecondDose();
        $('#healthDeclaration-form').validationEngine({
            prettySelect: true,
            promptPosition: "topLeft",
            scroll: true
        });

        $("#healthDeclaration-form input[name=passenger_name]").addClass('validate[required]');
        $("#healthDeclaration-form input[name=passport_no]").addClass('validate[required]');
        $("#healthDeclaration-form input[name=nationality]").addClass('validate[required]');
        $("#healthDeclaration-form select[name=country_code_mobile_number]").addClass('validate[required]');
        $("#healthDeclaration-form input[name=mobile_no]").addClass('validate[required]');
        $("#healthDeclaration-form select[name=age_in_years]").addClass('validate[required]');
        $("#healthDeclaration-form select[name=gender]").addClass('validate[required]');
        // $("#healthDeclaration-form input[id=local_contact_no]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=mode_of_transport]").addClass('validate[required]');
        $("#healthDeclaration-form input[id=arrival_date]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=journey_from_country_id]").addClass('validate[required]');
        //$("#healthDeclaration-form select[id=division_id]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=district_id]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=have_covid_symptoms]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=have_monkey_pox_symptoms]").addClass('validate[required]');
        $("#healthDeclaration-form select[id=is_vaccinated]").addClass('validate[required]');
        // $("#healthDeclaration-form input[id=flight_no]").addClass('validate[required]');

        var collection = document.getElementsByClassName("validate[required]");
        for (let i = 0; i < collection.length; i++) {
            let e = $(collection[i]);
            let name = e.attr('name');
            let label_for = name;
            e.siblings('label[for=' + label_for + ']').addClass('required');

        }

        // function viewVaccineInfo() {
        //    // $('#vaccination-info').hide();
        //     let isVaccinated = $('select[name=is_vaccinated]').val();
        //     if (isVaccinated === '1') {
        //         //$('#vaccination-info').show();
        //         //$("#healthDeclaration-form select[id=primary_vaccine_id]").addClass('validate[required]');
        //         $("#healthDeclaration-form select[id=is_rt_pcr_negative]").removeClass('validate[required]');
        //
        //     } else if (isVaccinated === '0') {
        //         //$('#vaccination-info').hide();
        //         $("#healthDeclaration-form select[id=primary_vaccine_id]").removeClass('validate[required]');
        //         $("#healthDeclaration-form select[id=is_rt_pcr_negative]").addClass('validate[required]');
        //
        //     }
        // }

        // function showVaccinationInfo() {
        //     viewVaccineInfo();
        //     $('select[name=is_vaccinated]').change(viewVaccineInfo);
        // }
        $('select[name=is_vaccinated]').on('change', function () {
            $('#rt-pcr-field').hide();
            $("#healthDeclaration-form select[id=is_rt_pcr_negative]").removeClass('validate[required]');
            if ($(this).val() == 0) {
                $('#rt-pcr-field').show();
                $("#healthDeclaration-form select[id=is_rt_pcr_negative]").addClass('validate[required]');
            }
        }).trigger('change')

        function showVaccineSecondDose() {
            $('select[name=primary_vaccine_id]').on('change', function () {
                $('#second_vaccine').show();
                if ($('select[name=primary_vaccine_id]').val() === '7') {
                    $('#second_vaccine').hide();
                }
            }).trigger('change');
        }

    </script>
@endsection
