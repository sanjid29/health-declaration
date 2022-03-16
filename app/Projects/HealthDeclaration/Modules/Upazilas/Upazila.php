<?php

namespace App\Projects\HealthDeclaration\Modules\Upazilas;

use \App\Projects\HealthDeclaration\Features\Modular\BaseModule\BaseModule;

class Upazila extends BaseModule
{
    // Note: Pull in necessary traits from relevant mainframe class
    use UpazilaHelper;

    protected $moduleName = 'upazilas';
    protected $table      = 'upazilas';
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
        'division_code',
        'division_name',
        'district_id',
        'district_code',
        'district_name',
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
        self::observe(UpazilaObserver::class);

        // static::saving(function (Upazila $element) { });
        // static::creating(function (Upazila $element) { });
        // static::updating(function (Upazila $element) { });
        // static::created(function (Upazila $element) { });
        // static::updated(function (Upazila $element) { });
        // static::saved(function (Upazila $element) { });
        // static::deleting(function (Upazila $element) { });
        // static::deleted(function (Upazila $element) { });
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

    /*
    |--------------------------------------------------------------------------
    | Section: Helpers
    |--------------------------------------------------------------------------
    */
    /**
     * Alias method to get the processor
     *
     * @return UpazilaProcessor
     * @noinspection SenselessProxyMethodInspection
     */
    public function processor()
    {
        return parent::processor();
    }

}
