<?php

namespace App;

/**
 * App\Division
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
class Division extends \App\Projects\HealthDeclaration\Modules\Divisions\Division
{
   /*--------------------------------------
   | Note : Empty class.
   | Write all logic in the relevant parent
   |---------------------------------------*/
}