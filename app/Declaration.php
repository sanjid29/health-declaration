<?php

namespace App;

/**
 * App\Declaration
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $passenger_name
 * @property string|null $passenger_dob
 * @property string|null $age_in_years
 * @property string|null $gender
 * @property string|null $passport_no
 * @property string|null $mode_of_transport
 * @property string|null $flight_no
 * @property string|null $seat_no
 * @property string|null $mobile_no
 * @property string|null $email
 * @property string|null $start_date
 * @property \Illuminate\Support\Carbon|null $arrival_date
 * @property string|null $nationality
 * @property int|null $country_code_mobile_number
 * @property int|null $journey_from_country_id
 * @property string|null $journey_from_country_name
 * @property array|null $visited_country_ids
 * @property string|null $visited_country_names
 * @property string|null $address_type
 * @property int|null $division_id
 * @property string|null $division_name
 * @property int|null $district_id
 * @property string|null $district_name
 * @property int|null $upazila_id
 * @property string|null $upazila_name
 * @property string|null $address
 * @property string|null $city_corporation
 * @property string|null $village
 * @property string|null $thana
 * @property string|null $union
 * @property string|null $ward
 * @property string|null $area
 * @property string|null $road
 * @property string|null $house
 * @property string|null $local_contact_no
 * @property int|null $have_covid_symptoms
 * @property int|null $have_monkey_pox_symptoms
 * @property int|null $has_loss_of_taste_or_smell
 * @property int|null $is_vaccinated
 * @property int|null $is_rt_pcr_negative
 * @property \Illuminate\Support\Carbon|null $first_vaccine_date
 * @property \Illuminate\Support\Carbon|null $second_vaccine_date
 * @property string|null $third_vaccine_date
 * @property string|null $decision
 * @property string|null $remark
 * @property int|null $is_archived
 * @property int|null $primary_vaccine_id
 * @property string|null $primary_vaccine_name
 * @property int|null $secondary_vaccine_id
 * @property string|null $secondary_vaccine_name
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
 * @property-read \App\Country|null $journeyFromCountry
 * @property-read \App\Module $linkedModule
 * @property-read \App\Country $originCountry
 * @property-read \App\Vaccine|null $primaryVaccine
 * @property-read \App\Project|null $project
 * @property-read \App\Vaccine|null $secondaryVaccine
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\Upazila|null $upazila
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration query()
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereAddressType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereAgeInYears($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereArrivalDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereCityCorporation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereCountryCodeMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDecision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDistrictName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereDivisionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereFirstVaccineDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereFlightNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereHasLossOfTasteOrSmell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereHaveCovidSymptoms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereHaveMonkeyPoxSymptoms($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereHouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereIsArchived($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereIsRtPcrNegative($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereIsVaccinated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereJourneyFromCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereJourneyFromCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereLocalContactNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereMobileNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereModeOfTransport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereNationality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration wherePassengerDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration wherePassengerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration wherePassportNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration wherePrimaryVaccineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration wherePrimaryVaccineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereRoad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereSeatNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereSecondVaccineDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereSecondaryVaccineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereSecondaryVaccineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereThana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereThirdVaccineDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereUnion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereUpazilaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereUpazilaName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereVillage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereVisitedCountryIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereVisitedCountryNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Declaration whereWard($value)
 * @mixin \Eloquent
 */
class Declaration extends \App\Projects\HealthDeclaration\Modules\Declarations\Declaration
{
   /*--------------------------------------
   | Note : Empty class.
   | Write all logic in the relevant parent
   |---------------------------------------*/
}