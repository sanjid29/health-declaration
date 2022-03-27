<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAndRenameFieldsInDeclarations extends Migration
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
            $table->dropColumn('origin_country_name');
            $table->dropColumn('departure_date');
            $table->dropColumn('has_fever');
            $table->dropColumn('has_headache');
            $table->dropColumn('has_tiredness');
            $table->dropColumn('has_cough');
            $table->dropColumn('has_shortness_of_breath');
            $table->dropColumn('profile_picture_path');
            $table->dropColumn('has_covid');
            $table->dropColumn('was_covid_affected');
            $table->dropColumn('last_covid_affected_on');
            $table->renameColumn('has_sore_throat','have_covid_symptoms');
            $table->string('thana',255)->nullable()->default(null)->after('village');
            $table->string('area',255)->nullable()->default(null)->after('ward');
            $table->string('city_corporation',255)->nullable()->default(null)->after('upazila_name');
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
