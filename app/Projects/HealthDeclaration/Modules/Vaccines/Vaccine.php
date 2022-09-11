<?php

namespace App\Projects\HealthDeclaration\Modules\Vaccines;

use \App\Projects\HealthDeclaration\Features\Modular\BaseModule\BaseModule;

/**
 * App\Projects\HealthDeclaration\Modules\Vaccines\Vaccine
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $details
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
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vaccine whereUuid($value)
 * @mixin \Eloquent
 */
class Vaccine extends BaseModule
{
    // Note: Pull in necessary traits from relevant mainframe class
    use VaccineHelper;

    protected $moduleName = 'vaccines';
    protected $table      = 'vaccines';
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
        self::observe(VaccineObserver::class);

        // static::saving(function (Vaccine $element) { });
        // static::creating(function (Vaccine $element) { });
        // static::updating(function (Vaccine $element) { });
        // static::created(function (Vaccine $element) { });
        // static::updated(function (Vaccine $element) { });
        // static::saved(function (Vaccine $element) { });
        // static::deleting(function (Vaccine $element) { });
        // static::deleted(function (Vaccine $element) { });
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
     * @return VaccineProcessor
     * @noinspection SenselessProxyMethodInspection
     */
    public function processor()
    {
        return parent::processor();
    }

}
