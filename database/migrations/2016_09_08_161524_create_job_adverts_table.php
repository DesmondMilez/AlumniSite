<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned()->index();
            $table->string('subject');
            $table->text('description');
            $table->integer('views');
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
        Schema::drop('job_adverts');
    }
}
