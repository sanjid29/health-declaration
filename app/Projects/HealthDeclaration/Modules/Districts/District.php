<?php

namespace App\Projects\HealthDeclaration\Modules\Districts;

use \App\Projects\HealthDeclaration\Features\Modular\BaseModule\BaseModule;

/**
 * App\Projects\HealthDeclaration\Modules\Districts\District
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string $name_BN
 * @property string $combinedcode
 * @property float $latitude
 * @property float $longitude
 * @property string $code
 * @property int|null $division_id
 * @property string|null $division_code
 * @property string|null $division_name
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
 * @property-read \App\Division|null $division
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upazila[] $upazilas
 * @property-read int|null $upazilas_count
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|District query()
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCombinedcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereDivisionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereDivisionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereNameBN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|District whereUuid($value)
 * @mixin \Eloquent
 */
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
