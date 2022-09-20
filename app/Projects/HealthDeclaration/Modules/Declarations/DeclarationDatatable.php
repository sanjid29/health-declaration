<?php

namespace App\Projects\HealthDeclaration\Modules\Declarations;

use \App\Projects\HealthDeclaration\Features\Datatable\ModuleDatatable;
use Carbon\Carbon;

class DeclarationDatatable extends ModuleDatatable
{
    // Note: Pull in necessary traits

    public $moduleName = 'declarations';

    /*---------------------------------
    | Section : Define query tables/model
    |---------------------------------*/
    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function source()
    {
        // return \DB::table($this->table)->leftJoin('users as updater', 'updater.id', $this->table.'.updated_by'); // Old table based implementation
        return Declaration::remember('medium')->with(['updater:id,name', 'primaryVaccine:name', 'journeyFromCountry:name']); // Model based query.
    }

    public function query()
    {
        $query = $this->source()->select($this->selects());
        // Exclude deleted rows
        $query->whereNull($this->table.'.deleted_at');

        if (request('is_archived') == 1) { // Example code
            $query->where('is_archived', request('is_archived'));

        } else {
            $query->where('is_archived', 0);
        }
        if (request('show_all') == 1) {
            $query = $this->source()->select($this->selects());
            // Exclude deleted rows
            $query->whereNull($this->table.'.deleted_at');
        }

        return $this->filter($query);
    }

    /*---------------------------------
    | Section : Define columns
    |---------------------------------*/
    /**
     * @return array
     */
    public function columns()
    {
        return [
            // [TABLE_FIELD, SQL_TABLE_FIELD_AS, HTML_GRID_TITLE],
            // [$this->table.'.id', 'id', 'ID'],
            [$this->table.'.passenger_name', 'passenger_name', 'Name'],
            [$this->table.'.passport_no', 'passport_no', 'Passport'],
            [$this->table.'.flight_no', 'flight_no', 'Flight'],
            [$this->table.'.mobile_no', 'mobile_no', 'Mobile No'],
            [$this->table.'.mode_of_transport', 'mode_of_transport', 'Mode Of Transport'],
            [$this->table.'.journey_from_country_name', 'journey_from_country_name', 'Journey From'],
            [$this->table.'.arrival_date', 'arrival_date', 'Arrival Date'],
            [$this->table.'.have_covid_symptoms', 'have_covid_symptoms', 'Have Covid Symptoms'],
            [$this->table.'.have_monkey_pox_symptoms', 'have_monkey_pox_symptoms', 'Have Monkey Pox Symptoms'],
            [$this->table.'.is_vaccinated', 'is_vaccinated', 'Is Vaccinated'],
        ];
    }

    /*---------------------------------
    | Section: SQL Select query
    |---------------------------------*/
    // /**
    //  * Construct SELECT statement (field1 AS f1, field2 as f2...)
    //  *
    //  * @return array
    //  */
    public function selects()
    {
        $columns = array_merge($this->columns(),
            [
                // [TABLE_FIELD, SQL_TABLE_FIELD_AS, HTML_GRID_TITLE],
                [$this->table.'.id', 'id', 'ID'],
            ]

        );

        // Note: Modify the $columns as you need.
        return $this->selectQueryString($columns);
    }

    /*---------------------------------
    | Section: Filters
    |---------------------------------*/
    // /**
    //  * @param  \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|mixed  $query
    //  * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|mixed
    //  */
    public function filter($query)
    {
        // if (request('id')) { // Example code
        //     $query->where('id', request('id'));
        // }

        if (request('arrival_date')) {
            $start_date = Carbon::create(request('arrival_date'));
            $query->where('arrival_date', $start_date);
        }
        if (request('arrival_date_from') && request('arrival_date_till')) {
            $start_date = Carbon::create(request('arrival_date_from'));
            $end_date = Carbon::create(request('arrival_date_till'));
            $query->whereBetween('arrival_date', [$start_date, $end_date]);
        }
        if (request('have_covid_symptoms')) {
            $query->where('have_covid_symptoms', request('have_covid_symptoms'));
        }
        if (request('have_monkey_pox_symptoms')) {
            $query->where('have_monkey_pox_symptoms', request('have_monkey_pox_symptoms'));
        }
        if (request('is_vaccinated')) {
            $query->where('is_vaccinated', request('is_vaccinated'));
        }
        if (request('passport_no')) {
            $query->where('passport_no', request('passport_no'));
        }
        if (request('mobile_no')) {
            $query->where('mobile_no', request('mobile_no'));
        }
        if (request('flight_no')) {
            $query->where('flight_no', request('flight_no'));
        }

        return $query;
    }

    /*---------------------------------
    | Section : Modify row-columns
    |---------------------------------*/
    // /**
    //  * @param  \Yajra\DataTables\DataTableAbstract  $dt
    //  * @return mixed|\Yajra\DataTables\DataTableAbstract
    //  */
    public function modify($dt)
    {
        $dt = parent::modify($dt);
        $dt->rawColumns([
            'id', 'passenger_name',
            'have_covid_symptoms',
            'have_monkey_pox_symptoms',
            'is_vaccinated',
            'email', 'is_active',
        ]); // Dynamically set HTML columns

        if ($this->hasColumn('first_vaccine_date')) {
            $dt->editColumn('first_vaccine_date', function ($row) { return formatDate($row->first_vaccine_date); });
        }
        if ($this->hasColumn('second_vaccine_date')) {
            $dt->editColumn('second_vaccine_date', function ($row) { return formatDate($row->second_vaccine_date); });
        }
        if ($this->hasColumn('passenger_name')) {
            $dt = $dt->editColumn('passenger_name', function ($row) {
                return '<a href="'.route($this->module->name.'.edit', $row->id).'">'.$row->passenger_name.'</a>';
            });
        }
        if ($this->hasColumn('have_covid_symptoms')) {
            $dt->editColumn('have_covid_symptoms', function ($row) { return formatYesNo($row->have_covid_symptoms); });
        }
        if ($this->hasColumn('have_monkey_pox_symptoms')) {
            $dt->editColumn('have_monkey_pox_symptoms', function ($row) { return formatYesNo($row->have_monkey_pox_symptoms); });
        }
        if ($this->hasColumn('is_vaccinated')) {
            $dt->editColumn('is_vaccinated', function ($row) { return formatBoolean($row->is_vaccinated); });
        }

        return $dt;

    }

    /*---------------------------------
    | Section : Additional methods
    |---------------------------------*/
    // public function query()
    // public function json()
    // public function hasColumn()
    // public function titles()
    // public function columnsJson()
    // public function ajaxUrl()
    // public function identifier()
}