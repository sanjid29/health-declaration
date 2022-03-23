<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnionWardInDeclarations extends Migration
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
            $table->text('union')->nullable()->default(null)->after('village');
            $table->text('ward')->nullable()->default(null)->after('union');

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
