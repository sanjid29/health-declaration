<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsVaccinatedInDeclarations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('declarations', function (Blueprint $table) {
            //
            $table->tinyInteger('is_vaccinated')->nullable()->default(null)->after('last_covid_affected_on');

            $table->tinyInteger('has_taken_rt_pcr')->nullable()->default(null)->after('is_vaccinated');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delcarations', function (Blueprint $table) {
            //
        });
    }
}
