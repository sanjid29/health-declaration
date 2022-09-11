<?php

namespace App\Projects\HealthDeclaration\Modules\Divisions;

use \App\Projects\HealthDeclaration\Features\Modular\BaseModule\BaseModule;

/**
 * App\Projects\HealthDeclaration\Modules\Divisions\Division
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\District[] $districts
 * @property-read int|null $districts_count
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
 * @method static \Illuminate\Database\Eloquent\Builder|Division newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Division query()
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCombinedcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereNameBN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Division whereUuid($value)
 * @mixin \Eloquent
 */
class Division extends BaseModule
{
    // Note: Pull in necessary traits from relevant mainframe class
    use DivisionHelper;

    protected $moduleName = 'divisions';
    protected $table      = 'divisions';
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
        self::observe(DivisionObserver::class);

        // static::saving(function (Division $element) { });
        // static::creating(function (Division $element) { });
        // static::updating(function (Division $element) { });
        // static::created(function (Division $element) { });
        // static::updated(function (Division $element) { });
        // static::saved(function (Division $element) { });
        // static::deleting(function (Division $element) { });
        // static::deleted(function (Division $element) { });
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
    public function districts()
    {
        return $this->hasMany(\App\District::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
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
     * @return DivisionProcessor
     * @noinspection SenselessProxyMethodInspection
     */
    public function processor()
    {
        return parent::processor();
    }

}
