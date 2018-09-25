<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrantMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrant_majors', function (Blueprint $table) {
            $table->integer('registrant_id')->unsigned();
            $table->integer('faculty');
            $table->integer('first');
            $table->integer('second');
            $table->integer('third');
            $table->primary('registrant_id');
            $table->foreign('registrant_id')->references('id')->on('registrant_profiles');
            $table->foreign('first')->references('major_id')->on('majors');
            $table->foreign('second')->references('major_id')->on('majors');
            $table->foreign('third')->references('major_id')->on('majors');
            $table->foreign('faculty')->references('id')->on('faculties');
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
        Schema::drop('registrant_majors');
    }
}
