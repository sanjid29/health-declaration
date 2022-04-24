<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocalContactNumberInDeclarations extends Migration
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
            $table->string('local_contact_no',20)->nullable()->default(null)->after('house');
        });

        Schema::table('countries', function (Blueprint $table) {
            //
            $table->string('calling_code_with_country',100)->nullable()->default(null)->after('calling_code');
        });
        \DB::table('countries')->orderBy('id')
            ->chunk(100, function ($rows) {
                foreach($rows as $row){
                    $newValue=$row->name." (".$row->calling_code.") ";
                    \DB::table('countries')
                        ->where('id',$row->id)
                        ->update([
                            'calling_code_with_country'=>$newValue
                    ]);
                }
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
