<?php

namespace App\Projects\HealthDeclaration\Modules\Upazilas;

use \App\Projects\HealthDeclaration\Features\Modular\BaseModule\BaseModule;

/**
 * App\Projects\HealthDeclaration\Modules\Upazilas\Upazila
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
 * @property int|null $district_id
 * @property string|null $district_code
 * @property string|null $district_name
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
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila query()
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereCombinedcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereDistrictCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereDistrictName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereDivisionCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereDivisionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereNameBN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upazila whereUuid($value)
 * @mixin \Eloquent
 */
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
    public function division()
    {
        return $this->belongsTo(\App\Division::class);
    }

    public function district()
    {
        return $this->belongsTo(\App\District::class);
    }
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
