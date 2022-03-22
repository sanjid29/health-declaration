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
 * @var \App\Projects\HealthDeclaration\Modules\Declarations\DeclarationViewProcessor $view
 */
?>
<script>
    /*
    |--------------------------------------------------------------------------
    | Common - creating and updating
    |--------------------------------------------------------------------------
    */
    // $('select').select2(); // Make all select2

    // Redirection after delete
    @if($element->some_id)
    $('.delete-cta button[name=genericDeleteBtn]').attr('data-redirect_success', '{!! route('some-module.edit',$element->some_id) !!}')
    @endif
    showVaccinationInfo();
    // Validation
    addValidationRules();
    enableValidation('{{$module->name}}');
    $('select[id=origin_country_id],select[id=primary_vaccine_id],select[id=secondary_vaccine_id],select[id=journey_from_country_id],select[id=visited_country_ids]').select2();

    /*
    |--------------------------------------------------------------------------
    | creating
    |--------------------------------------------------------------------------
    */
    @if($element->isCreating())
    // Todo: write codes here.
    @endif

    /*
    |--------------------------------------------------------------------------
    | updating
    |--------------------------------------------------------------------------
    */
    @if($element->isUpdating())
    // Todo: write codes here.
    // Redirection after saving
    // $('#{{$module->name}}-redirect-success').val('#'); //  # Stops redirection
    @endif
    /*
    |--------------------------------------------------------------------------
    | List of functions
    |--------------------------------------------------------------------------
    */
    /**
     * Add CSS for validation rules
     */
    function addValidationRules() {
        // $("input[name=name]").addClass('validate[required]');
    }
    function viewVaccineInfo() {
        $('#rt-pcr-field').hide();
        $('#vaccination-info').hide();
        let isVaccinated = $('select[name=is_vaccinated]').val();
        if (isVaccinated === '1') {
            $('#vaccination-info').show();
            $('#rt-pcr-field').hide();
            $("#healthDeclaration-form select[id=primary_vaccine_id]").addClass('validate[required]');
            $("#healthDeclaration-form select[id=has_taken_rt_pcr]").removeClass('validate[required]');

        } else if (isVaccinated === '0') {
            $('#rt-pcr-field').show();
            $('#vaccination-info').hide();
            $("#healthDeclaration-form select[id=primary_vaccine_id]").removeClass('validate[required]');
            $("#healthDeclaration-form select[id=has_taken_rt_pcr]").addClass('validate[required]');

        }
    }

    function showVaccinationInfo() {
        viewVaccineInfo();
        $('select[name=is_vaccinated]').change(viewVaccineInfo);
    }
</script>