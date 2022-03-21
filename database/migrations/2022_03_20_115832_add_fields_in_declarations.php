<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsInDeclarations extends Migration
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
            $table->string('mode_of_transport',100)->nullable()->default(null)->after('passport_no');
            $table->tinyInteger('was_covid_affected')->nullable()->default(null)->after('has_loss_of_taste_or_smell');
            $table->date('last_covid_affected_on')->nullable()->default(null)->after('was_covid_affected');
            $table->text('decision')->nullable()->default(null)->after('third_vaccine_date');
            $table->text('remark')->nullable()->default(null)->after('decision');

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
