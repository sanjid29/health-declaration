<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVaccineNameInDeclarations extends Migration
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
            $table->date('third_vaccine_date')->nullable()->default(null)->after('second_vaccine_date');
            $table->integer('primary_vaccine_id')->nullable()->default(null)->after('third_vaccine_date');
            $table->string('primary_vaccine_name',255)->nullable()->default(null)->after('primary_vaccine_id');
            $table->integer('secondary_vaccine_id')->nullable()->default(null)->after('primary_vaccine_name');
            $table->string('secondary_vaccine_name',255)->nullable()->default(null)->after('secondary_vaccine_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('declarations', function (Blueprint $table) {
            //
        });
    }
}
