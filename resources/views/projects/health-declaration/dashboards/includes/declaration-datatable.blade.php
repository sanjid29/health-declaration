<?php
/**
 * Variables
 * @var \App\Mainframe\Features\Datatable\Datatable $datatable
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var array $columns
 * @var \App\Mainframe\Features\Core\ViewProcessor $view
 */
$datatable = new \App\Projects\HealthDeclaration\Datatables\DeclarationDatatable();

$titles = $datatable->titles();
$columnsJson = $datatable->columnsJson();
$ajaxUrl = $datatable->ajaxUrl();
$datatableName = $datatable->name();
?>
<h3>Active Health Declarations</h3>
<div class="{{$datatableName}}-container datatable-container">
    <div class="filters col-md-12 no-padding">
        @include('form.select-array',['var'=>['name'=>'have_covid_symptoms','label'=>'Has Covid Symptoms?', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'have_monkey_pox_symptoms','label'=>'Has Monkey Pox?', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        @include('form.select-array',['var'=>['name'=>'is_vaccinated','label'=>'Is Vaccinated?', 'div'=>'col-sm-3','options'=>(\App\Declaration::$yesNo)]])
        <div class="clearfix"></div>
        @include('form.text',['var'=>['name'=>'passport_no','label'=>'Passport No', 'div'=>'col-sm-3']])
        @include('form.text',['var'=>['name'=>'mobile_no','label'=>'Mobile No', 'div'=>'col-sm-3']])
        @include('form.text',['var'=>['name'=>'flight_no','label'=>'Flight No', 'div'=>'col-sm-3']])
        <div class="clearfix"></div>
        @include('form.date',['var'=>['id'=>'arrival_date','name'=>'arrival_date','label'=>'Date of Arrival', 'div'=>'col-sm-3','params'=>['autocomplete=off']]])

    </div>
    <table id="{{$datatableName}}"
           class="table module-grid table-condensed {{$datatableName}} dataTable table-hover bordered"
           style="width: 100%">
        <thead>
        <tr>
            @foreach($titles as $title)
                <th>{!! $title !!}</th>
            @endforeach
        </tr>
        </thead>
    </table>
</div>

{{--
Section: Data table JS
   We are using and older version of datatable here that instantiates
   using 'dataTable'. The newer version can be initialized using
   'Datatable' (Capital D). The newer version should be used for
   custom datatables.
   For this olderversion we are using fnSetFilteringDelay(2000) for
   the inital search delay.
--}}

@section('js')
    <script type="text/javascript">




        var {{$datatableName}} = $('#{{$datatableName}}').DataTable({
            ajax: {
                url: "{!! $ajaxUrl !!}",
                data: function (d) {
                    d.have_covid_symptoms = $('#have_covid_symptoms').val();
                    d.have_monkey_pox_symptoms = $('#have_monkey_pox_symptoms').val();
                    d.is_vaccinated = $('#is_vaccinated').val();
                    d.passport_no = $('#passport_no').val();
                    d.mobile_no = $('#mobile_no').val();
                    d.flight_no = $('#flight_no').val();
                    d.arrival_date = $('#arrival_date').val();

                }
            },
            columns: [{!! $columnsJson !!}],
            processing: true,
            serverSide: true,
            searchDelay: {!! $datatable->searchDelay() !!}, // Search delay
            minLength: {!! $datatable->minLength() !!},     // Minimum characters to be typed before search begins
            lengthMenu: {!! $datatable->lengthMenu() !!},
            pageLength: {!! $datatable->pageLength()!!},
            order: {!! $datatable->order()!!},              // First row descending
            bLengthChange: {!! $datatable->bLengthChange() !!}, // show the length field
            bPaginate: {!! $datatable->bPaginate() !!},
            bFilter: {!! $datatable->bFilter() !!},
            bInfo: {!! $datatable->bInfo() !!},
            bDeferRender: {!! $datatable->bDeferRender() !!},
            "dom": 'Blftipr',                               // Special code to load dom element. i.e. B=buttons
            "buttons": [
                {
                    className: 'dt-refresh-btn btn btn-sm btn-default pull-left bg-white form-control input-sm',
                    text: '<ion-icon class="dt-reload" name="reload"></ion-icon>',
                    action: function (e, dt, node, config) {
                        dt.draw();
                    }
                }
            ],
            mark: true
        });
        {{--        {{$datatableName}}.buttons().container().appendTo('.dataTables_length');--}}

        // Respond to change
        $('#have_covid_symptoms,#have_monkey_pox_symptoms,#is_vaccinated,#passport_no,#mobile_no,#flight_no,#arrival_date_formatted').on('change', function () {

            {{$datatableName}}.draw();
        });



    </script>
    @parent
@endsection

@unset($datatable)