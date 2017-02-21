<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAdvertsSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_adverts_skills_pivot', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skill_id')->index();
            $table->integer('job_ad_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('job_adverts_skills_pivot');
    }
}
