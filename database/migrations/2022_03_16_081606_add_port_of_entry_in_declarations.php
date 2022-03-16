<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPortOfEntryInDeclarations extends Migration
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
            $table->renameColumn('sit_no','seat_no');
            $table->string('port_entry',255)->nullable()->default(null)->after('mobile_no');
            $table->string('profile_picture_path',255)->nullable()->default(null)->after('second_vaccine_date');
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
