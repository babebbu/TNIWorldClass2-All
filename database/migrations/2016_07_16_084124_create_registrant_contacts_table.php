<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrantContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrant_contacts', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('phone',12);
            $table->string('parentphone');
            $table->string('province');
            $table->string('email');
            $table->string('webblog')->nullable();
            $table->foreign('id')->references('id')->on('registrant_profiles');
            $table->primary('id');
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
        Schema::drop('registrant_contacts');
    }
}
