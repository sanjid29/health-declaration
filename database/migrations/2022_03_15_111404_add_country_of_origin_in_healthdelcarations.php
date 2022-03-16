<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryOfOriginInHealthdelcarations extends Migration
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
            $table->integer('destination_country_id')->change();
            $table->integer('division_id')->change();
            $table->integer('district_id')->change();
            $table->integer('upazila_id')->change();
            $table->integer('origin_country_id')->nullable()->default(null)->after('departure_date');
            $table->string('origin_country_name')->nullable()->default(null)->after('origin_country_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('healthdelcarations', function (Blueprint $table) {
            //
        });
    }
}
