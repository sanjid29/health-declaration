<?php

namespace App;

/**
 * App\Country
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $code
 * @property string|null $country_id
 * @property string|null $iso2
 * @property string|null $country_short_name
 * @property string|null $country_long_name
 * @property string|null $iso3
 * @property string|null $numcode
 * @property string|null $un_member
 * @property string|null $calling_code
 * @property string|null $calling_code_with_country
 * @property string|null $cctld
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property string|null $currency
 * @property string|null $currency_symbol
 * @property string|null $currency_override
 * @property string|null $currency_override_symbol
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
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCallingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCallingCodeWithCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCctld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrencyOverride($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrencyOverrideSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrencySymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIso2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIso3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereNumcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUnMember($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUuid($value)
 * @mixin \Eloquent
 */
class Country extends \App\Mainframe\Modules\Countries\Country
{
   /*--------------------------------------
   | Note : Empty class.
   | Write all logic in the relevant parent
   |---------------------------------------*/
}