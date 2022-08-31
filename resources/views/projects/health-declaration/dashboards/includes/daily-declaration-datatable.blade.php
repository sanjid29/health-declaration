<?php
/**
 * Variables
 * @var \App\Mainframe\Features\Datatable\Datatable $datatable
 * @var \App\Mainframe\Modules\Modules\Module $module
 * @var array $columns
 * @var \App\Mainframe\Features\Core\ViewProcessor $view
 */
$datatable = new \App\Projects\HealthDeclaration\Datatables\DeclarationDatatable();
$today=\Carbon\Carbon::today();

$titles = $datatable->titles();
$columnsJson = $datatable->columnsJson();
$ajaxUrl = $datatable->ajaxUrl().'?arrival_date='.$today;
$datatableName = "dailyDeclarationDt";

?>
<h3>Today's Health Declarations</h3>
<div class="{{$datatableName}}-container datatable-container">
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
                url: "{!! $ajaxUrl !!}"
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




    </script>
    @parent
@endsection

@unset($datatable)