<?php
$prefix = null;
$label = null;
if (!isset($var['prefixIdentifier'])) {
    $var['prefixIdentifier'] = null;
} else {
    $prefix = $var['prefixIdentifier'];
}
if (!isset($var['labelIdentifier'])) {
    $var['labelIdentifier'] = null;
} else {
    $label = $var['labelIdentifier'];
}

?>

@include('form.select-model',['var'=>['name'=>$prefix.'division_id','label'=>$label.'Division/বিভাগ *', 'name_field'=>'name', 'model'=>\App\Division::class,'class'=>'select2','container_class'=>'col-md-4']])

@include('form.select-model',['var'=>['name'=>$prefix.'district_id','label'=>$label.'District/জেলা *', 'name_field'=>'name', 'model'=>\App\District::class,'class'=>'select2','container_class'=>'col-md-4']])

@include('form.select-model',['var'=>['name'=>$prefix.'upazila_id','label'=>$label.'Upazila/Thana/উপজেলা', 'name_field'=>'name', 'model'=>\App\Upazila::class,'class'=>'select2','container_class'=>'col-md-4']])
@section('js')
    @parent
    <script type="text/javascript">
        changeDistrictBasedOnDivision();
        changeUpazilaBasedOnDistrict();

        function changeDistrictBasedOnDivision() {
            var parentSelect = $('select[name={{$prefix}}division_id]');
            var childSelect = $("select[name={{$prefix}}district_id]");
            var url = '{{route('districts.list-json',['is_active'=>'1','force_all_data'=>'yes'])}}';
            parentSelect.select2();
            childSelect.select2();

            // $("select[name=district_id]").select2("val", "").empty().select2('enable', false);
            childSelect.select2('enable', false);
            parentSelect.on('change', function () { // https://select2.github.io/select2/ > Events
                var childOldValue = childSelect.select2('val'); // Temprarily store value to assign after ajax loading
                childSelect.select2("val", "").empty().select2('enable', false); // Clear and disable child
                /*----------------------------------------
                | Options 1 : Axios based implementations
                |----------------------------------------*/
                axios.get(url, {
                    params: {
                        division_id: $(this).select2('val')
                    }
                }).then((response) => {
                    $(childSelect).append("<option value=0>" + "-" + "</option>"); // Add empty selection
                    $.each(response.data.data.items, function (i, obj) { // Load options
                        $(childSelect).append("<option value=" + obj.id + ">" + obj.name + "</option>");
                    });
                    childSelect.select2('enable', true); // Enable back child after the ajax call
                    childSelect.val(childOldValue).select2(); // Assign backold value
                });
                /*---------  END OPTION 1 -----------*/

            });
        }

        function changeUpazilaBasedOnDistrict() {
            let division = $('select[name={{$prefix}}division_id]');
            var parentSelect = $('select[name={{$prefix}}district_id]');
            var childSelect = $("select[name={{$prefix}}upazila_id]");
            var url = '{{route('upazilas.list-json',['is_active'=>'1'])}}';
            division.select2();
            parentSelect.select2();
            childSelect.select2();
            //childSelect.select2("val", "").empty().select2('enable', false);
            //$("select[name=upazila_id]").select2("val", "").empty().select2('enable', false);
            childSelect.select2('enable', false);
            parentSelect.on('change', function () { // https://select2.github.io/select2/ > Events
                var childOldValue = childSelect.select2('val'); // Temprarily store value to assign after ajax loading
                childSelect.select2("val", "").empty().select2('enable', false); // Clear and disable child
                /*----------------------------------------
                | Options 1 : Axios based implementations
                |----------------------------------------*/
                axios.get(url, {
                    params: {
                        division_id: division.select2('val'),
                        district_id: $(this).select2('val'),
                        force_all_data:'yes'
                    }
                }).then((response) => {
                    console.log(response);
                    $(childSelect).append("<option value=0>" + "-" + "</option>"); // Add empty selection
                    $.each(response.data.data.items, function (i, obj) { // Load options
                        $(childSelect).append("<option value=" + obj.id + ">" + obj.name + "</option>");
                    });
                    childSelect.select2('enable', true); // Enable back child after the ajax call
                    childSelect.val(childOldValue).select2(); // Assign backold value
                });
                /*---------  END OPTION 1 -----------*/

            });
        }
    </script>
@endsection
