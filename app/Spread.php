<?php

namespace App;

/**
 * App\Spread
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $spreadable_type
 * @property int|null $spreadable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property string|null $key Field name
 * @property string|null $tag Tag name
 * @property string|null $relates_to The second model
 * @property int|null $related_id
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
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $spreadable
 * @property-read \Illuminate\Database\Eloquent\Collection|Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Spread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spread query()
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereRelatedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereRelatesTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereSpreadableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereSpreadableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spread whereUuid($value)
 * @mixin \Eloquent
 */
class Spread extends \App\Mainframe\Modules\Spreads\Spread
{
   /*--------------------------------------
   | Note : Empty class.
   | Write all logic in the relevant parent
   |---------------------------------------*/
}