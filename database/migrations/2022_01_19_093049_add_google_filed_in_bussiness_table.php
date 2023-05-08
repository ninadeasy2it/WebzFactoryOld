<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGoogleFiledInBussinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('businesses', function (Blueprint $table) {
            $table->string('status')->default('active')->after('links');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table(
            'businesses', function (Blueprint $table){
            $table->dropColumn('status');
        }
        );
    }
}
