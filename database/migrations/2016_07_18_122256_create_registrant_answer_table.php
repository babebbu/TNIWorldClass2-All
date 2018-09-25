<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrantAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrant_answer', function (Blueprint $table) {
            $table->integer('registrant_id')->unsigned();
            $table->integer('quiz_id');
            $table->text('answer');
            $table->primary('registrant_id');
            $table->foreign('registrant_id')->references('id')->on('registrant_profiles');
            $table->foreign('quiz_id')->references('quiz_id')->on('question');
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
        Schema::drop('registrant_answer');
    }
}
