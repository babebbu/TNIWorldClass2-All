<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facebook_staffs', function (Blueprint $table) {
            $table->string('facebook_id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->text('avatar');
            $table->text('avatar_original');
            $table->timestamps();

            $table->primary('facebook_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facebook_staffs');
    }
}