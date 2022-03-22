<?php

namespace App\Projects\HealthDeclaration\Modules\Declarations;

use \App\Projects\HealthDeclaration\Features\Datatable\ModuleDatatable;

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
       return Declaration::with(['updater:id,name','primaryVaccine:name','journeyFromCountry:name']); // Model based query.
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
            [$this->table.'.id', 'id', 'ID'],
            [$this->table.'.passenger_name', 'passenger_name', 'Name'],
            [$this->table.'.passport_no', 'passport_no', 'Passport'],
            [$this->table.'.mode_of_transport', 'mode_of_transport', 'Mode Of Transport'],
            [$this->table.'.journey_from_country_id', 'journey_from_country_id', 'Journey From'],
            [$this->table.'.has_covid', 'has_covid', 'Has Covid'],
            [$this->table.'.primary_vaccine_id', 'primary_vaccine_id', 'Vaccine'],
            [$this->table.'.first_vaccine_date', 'first_vaccine_date', 'First Vaccine Date'],
            [$this->table.'.second_vaccine_date', 'second_vaccine_date', 'Second Vaccine Date'],
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
    // public function selects()
    // {
    //     $columns = $this->columns();
    //     // Note: Modify the $columns as you need.
    //     return $this->selectQueryString($columns);
    // }

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
        // $dt->rawColumns(['id', 'email', 'is_active']); // Dynamically set HTML columns

        if ($this->hasColumn('journey_from_country_id')) {
            $dt->editColumn('journey_from_country_id', function ($row) { return optional($row->journeyFromCountry)->name; });
        }
        if ($this->hasColumn('primary_vaccine_id')) {
            $dt->editColumn('primary_vaccine_id', function ($row) { return optional($row->primaryVaccine)->name; });
        }
        if ($this->hasColumn('first_vaccine_date')) {
            $dt->editColumn('first_vaccine_date', function ($row) { return formatDate($row->first_vaccine_date); });
        }
        if ($this->hasColumn('second_vaccine_date')) {
            $dt->editColumn('second_vaccine_date', function ($row) { return formatDate($row->second_vaccine_date); });
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