<?php

namespace App\Projects\HealthDeclaration\Modules\Declarations;

use \App\Projects\HealthDeclaration\Features\Modular\BaseModule\BaseModule;

/**
 * App\Projects\HealthDeclaration\Modules\Declarations\Declaration
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $passenger_name
 * @property string|null $passenger_dob
 * @property string|null $age_in_years
 * @property string|null $gender
 * @property string|null $passport_no
 * @property string|null $mode_of_transport
 * @property string|null $flight_no
 * @property string|null $seat_no
 * @property string|null $mobile_no
 * @property string|null $email
 * @property string|null $start_date
 * @property \Illuminate\Support\Carbon|null $arrival_date
 * @property string|null $nationality
 * @property int|null $country_code_mobile_number
 * @property int|null $journey_from_country_id
 * @property string|null $journey_from_country_name
 * @property array|null $visited_country_ids
 * @property string|null $visited_country_names
 * @property string|null $address_type
 * @property int|null $division_id
 * @property string|null $division_name
 * @property int|null $district_id
 * @property string|null $district_name
 * @property int|null $upazila_id
 * @property string|null $upazila_name
 * @property string|null $address
 * @property string|null $city_corporation
 * @property string|null $village
 * @property string|null $thana
 * @property string|null $union
 * @property string|null $ward
 * @property string|null $area
 * @property string|null $road
 * @property string|null $house
 * @property string|null $local_contact_no
 * @property int|null $have_covid_symptoms
 * @property int|null $have_monkey_pox_symptoms
 * @property int|null $has_loss_of_taste_or_smell
 * @property int|null $is_vaccinated
 * @property int|null $is_rt_pcr_negative
 * @property \Illuminate\Support\Carbon|null $first_vaccine_date
 * @property \Illuminate\Support\Carbon|null $second_vaccine_date
 * @property string|null $third_vaccine_date
 * @property string|null $decision
 * @property string|null $remark
 * @property int|null $is_archived
 * @property int|null $primary_vaccine_id
 * @property string|null $primary_vaccine_name
 * @property int|null $secondary_vaccine_id
 * @property string|null $secondary_vaccine_name
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Features\Audit\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\District|null $district
 * @property-read \App\Division|null $division
 * @property-read \App\Country|null $journeyFromCountry
 * @property-read \App\Module $linkedModule
 * @property-read \App\Country $originCountry
 * @property-read \App\Vaccine|null $primaryVaccine
 * @property-read \App\Project|null $project
 * @property-read \App\Vaccine|null $secondaryVaccine
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\Upazila|null $upazila
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration query()
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereAddressType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereAgeInYears($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereArrivalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereCityCorporation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereCountryCodeMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDecision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDistrictName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDivisionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereFirstVaccineDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereFlightNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereHasLossOfTasteOrSmell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereHaveCovidSymptoms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereHaveMonkeyPoxSymptoms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereHouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereIsArchived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereIsRtPcrNegative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereIsVaccinated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereJourneyFromCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereJourneyFromCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereLocalContactNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereMobileNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereModeOfTransport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration wherePassengerDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration wherePassengerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration wherePassportNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration wherePrimaryVaccineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration wherePrimaryVaccineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereRoad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereSeatNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereSecondVaccineDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereSecondaryVaccineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereSecondaryVaccineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereThana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereThirdVaccineDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereUnion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereUpazilaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereUpazilaName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereVillage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereVisitedCountryIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereVisitedCountryNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereWard($value)
 * @mixin \Eloquent
 */
class Declaration extends BaseModule
{
    // Note: Pull in necessary traits from relevant mainframe class
    use DeclarationHelper;

    protected $moduleName = 'declarations';
    protected $table      = 'declarations';
    /*
    |--------------------------------------------------------------------------
    | Properties
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'project_id',
        'tenant_id',
        'uuid',
        'name',
        'passenger_name',
        //'passenger_dob',
        'age_in_years',
        'gender',
        'mode_of_transport',
        'passport_no',
        'flight_no',
        //'seat_no',
        'mobile_no',
        //'email',
        //'start_date',
        'arrival_date',
        'nationality',
        'country_code_mobile_number',
        'journey_from_country_id',
        'journey_from_country_name',
        'visited_country_ids',
        'visited_country_names',
        //'address_type',
        'division_id',
        'division_name',
        'district_id',
        'district_name',
        // 'upazila_id',
        // 'upazila_name',
        // 'address',
        // 'city_corporation',
        // 'union',
        // 'village',
        // 'thana',
        // 'ward',
        // 'area',
        // 'road',
        // 'house',
        'local_contact_no',
        'address',
        'have_covid_symptoms',
        'have_monkey_pox_symptoms',
        'is_vaccinated',
        'is_rt_pcr_negative',
        'first_vaccine_date',
        'second_vaccine_date',
        'third_vaccine_date',
        'primary_vaccine_id',
        'primary_vaccine_name',
        'secondary_vaccine_id',
        'secondary_vaccine_name',
        'profile_picture_path',
        'decision',
        'remark',
        'is_active',
        'is_archived',
    ];

    // protected $guarded = [];
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'first_vaccine_date', 'second_vaccine_date', 'arrival_date',];
    protected $casts = [
        'visited_country_ids' => 'array',
    ];
    // protected $with = [];
    // protected $appends = [];

    /*
    |--------------------------------------------------------------------------
    | Option values
    |--------------------------------------------------------------------------
    */
    // public static $types = [];
    public static $genderTypes = [
        'male' => 'Male',
        'female' => 'Female',
        'third_gender' => 'Third Gender',
    ];
    public static $yesNo       = [
        0 => 'No',
        1 => 'Yes',
    ];
    public static $modeOfTransportTypes       = [
        'air' => 'By Air',
        'road' => 'By Road',
        'sea' => 'By Sea',
        'train' => 'By Train',
    ];
    public static $typeOfAddresses       = [
        'rural' => 'Rural Area',
        'town' => 'Town',

    ];
    public static $ageGroups=[
      '0-12',
      '13-30',
      '31-48',
      '49-65',
      '65+',
    ];

    /*
    |--------------------------------------------------------------------------
    | Boot method and model events.
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();
        self::observe(DeclarationObserver::class);

        // static::saving(function (Declaration $element) { });
        // static::creating(function (Declaration $element) { });
        // static::updating(function (Declaration $element) { });
        // static::created(function (Declaration $element) { });
        // static::updated(function (Declaration $element) { });
        // static::saved(function (Declaration $element) { });
        // static::deleting(function (Declaration $element) { });
        // static::deleted(function (Declaration $element) { });
    }

    /*
    |--------------------------------------------------------------------------
    | Section: Query scopes + Dynamic scopes
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Section: Accessors
    |--------------------------------------------------------------------------
    */
    // public function getFirstNameAttribute($value) { return ucfirst($value); }

    /*
    |--------------------------------------------------------------------------
    | Section: Mutators
    |--------------------------------------------------------------------------
    */
    // public function setFirstNameAttribute($value) { $this->attributes['first_name'] = strtolower($value); }

    /*
    |--------------------------------------------------------------------------
    | Section: Attributes
    |--------------------------------------------------------------------------
    */
    // public function getUrlAttribute(){return asset($this->path); }

    /*
    |--------------------------------------------------------------------------
    | Section: Relations
    |--------------------------------------------------------------------------
    */
    // public function updater() { return $this->belongsTo(\App\User::class, 'updated_by'); }
    public function originCountry()
    {
        return $this->belongsTo(\App\Country::class, 'origin_country_id');
    }

    public function journeyFromCountry()
    {
        return $this->belongsTo(\App\Country::class, 'journey_from_country_id');
    }

    public function division()
    {
        return $this->belongsTo(\App\Division::class, 'division_id');
    }
    public function district()
    {
        return $this->belongsTo(\App\District::class, 'district_id');
    }
    public function upazila()
    {
        return $this->belongsTo(\App\Upazila::class, 'upazila_id');
    }

    public function primaryVaccine()
    {
        return $this->belongsTo(\App\Vaccine::class, 'primary_vaccine_id');
    }
    public function secondaryVaccine()
    {
        return $this->belongsTo(\App\Vaccine::class, 'secondary_vaccine_id');
    }
    /*
    |--------------------------------------------------------------------------
    | Section: Helpers
    |--------------------------------------------------------------------------
    */
    /**
     * Alias method to get the processor
     *
     * @return DeclarationProcessor
     * @noinspection SenselessProxyMethodInspection
     */
    public function processor()
    {
        return parent::processor();
    }

}
