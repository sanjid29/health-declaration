<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateOfDepertureInDeclarations extends Migration
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
            $table->dateTime('start_date')->nullable()->default(null)->after('email');

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
