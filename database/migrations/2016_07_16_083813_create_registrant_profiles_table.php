<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrantProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrant_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('facebook_id');
            $table->string('title',6);
            $table->string('firstname',128);
            $table->string('lastname',128);
            $table->string('nickname',32);
            $table->string('gender',1);
            $table->float('gpax');
            $table->integer('school_id')->unsigned();
            $table->string('major');
            $table->date('birthday');
            $table->text('nationality');
            $table->text('religions');
            $table->string('profile_picture');
            $table->foreign('school_id')->references('school_id')->on('schools');
            $table->foreign('facebook_id')->references('facebook_id')->on('facebook_registrants');
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
        Schema::drop('registrant_profiles');
    }
}
