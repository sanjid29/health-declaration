<?php

namespace App\Projects\HealthDeclaration\Modules\Districts;

use \App\Projects\HealthDeclaration\Features\Modular\BaseModule\BaseModule;

class District extends BaseModule
{
    // Note: Pull in necessary traits from relevant mainframe class
    use DistrictHelper;

    protected $moduleName = 'districts';
    protected $table      = 'districts';
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
        'name_BN',
        'combinedcode',
        'latitude',
        'longitude',
        'code',
        'division_id',
        //'division_code',
        //'division_name',
        'is_active',
    ];

    // protected $guarded = [];
    // protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    // protected $casts = [];
    // protected $with = [];
    // protected $appends = [];

    /*
    |--------------------------------------------------------------------------
    | Option values
    |--------------------------------------------------------------------------
    */
    // public static $types = [];

    /*
    |--------------------------------------------------------------------------
    | Boot method and model events.
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();
        self::observe(DistrictObserver::class);

        // static::saving(function (District $element) { });
        // static::creating(function (District $element) { });
        // static::updating(function (District $element) { });
        // static::created(function (District $element) { });
        // static::updated(function (District $element) { });
        // static::saved(function (District $element) { });
        // static::deleting(function (District $element) { });
        // static::deleted(function (District $element) { });
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
    public function division()
    {
        return $this->belongsTo(\App\Division::class);
    }
    public function upazilas()
    {
        return $this->hasMany(\App\Upazila::class);
    }
    /*
    |--------------------------------------------------------------------------
    | Section: Helpers
    |--------------------------------------------------------------------------
    */
    /**
     * Alias method to get the processor
     *
     * @return DistrictProcessor
     * @noinspection SenselessProxyMethodInspection
     */
    public function processor()
    {
        return parent::processor();
    }

}
