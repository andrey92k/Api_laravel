<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SearchEngines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_engines', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('se_id');
            $table->string('se_name');
            $table->string('se_country_name');
            $table->string('se_language');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
