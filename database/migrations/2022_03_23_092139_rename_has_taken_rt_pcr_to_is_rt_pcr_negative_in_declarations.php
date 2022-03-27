<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameHasTakenRtPcrToIsRtPcrNegativeInDeclarations extends Migration
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
            $table->renameColumn('has_taken_rt_pcr','is_rt_pcr_negative');
            $table->renameColumn('origin_country_id','country_code_mobile_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('is_rt_pcr_negative_in_delcarations', function (Blueprint $table) {
            //
        });
    }
}
