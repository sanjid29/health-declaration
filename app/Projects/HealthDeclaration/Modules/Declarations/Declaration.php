<?php

namespace App\Projects\HealthDeclaration\Modules\Declarations;

use \App\Projects\HealthDeclaration\Features\Modular\BaseModule\BaseModule;

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
        'passenger_dob',
        'gender',
        'mode_of_transport',
        'passport_no',
        'flight_no',
        'seat_no',
        'port_entry',
        'mobile_no',
        'email',
        'arrival_date',
        'departure_date',
        'nationality',
        'origin_country_id',
        'origin_country_name',
        'journey_from_country_id',
        'journey_from_country_name',
        'visited_country_ids',
        'visited_country_names',
        'division_id',
        'division_name',
        'district_id',
        'district_name',
        'upazila_id',
        'upazila_name',
        'village',
        'road',
        'house',
        'has_sore_throat',
        'has_fever',
        'has_headache',
        'has_tiredness',
        'has_cough',
        'has_shortness_of_breath',
        'has_loss_of_taste_or_smell',
        'has_covid',
        'was_covid_affected',
        'last_covid_affected_on',
        'is_vaccinated',
        'has_taken_rt_pcr',
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
    ];

    // protected $guarded = [];
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'first_vaccine_date', 'second_vaccine_date', 'arrival_date', 'departure_date'];
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
