<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('task_id');

            $table->string('post_key')->nullable();    
            $table->string('post_site');
            $table->string('result_datetime');

            $table->bigInteger('result_position');
            $table->string('result_url');    
            $table->longText('result_title');

            $table->string('result_snippet_extra')->nullable();
            $table->longText('result_snippet');
            $table->bigInteger('results_count');
            $table->string('result_extra');

            $table->string('result_spell')->nullable();
            $table->string('result_spell_type')->nullable();
            $table->string('result_se_check_url');

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
