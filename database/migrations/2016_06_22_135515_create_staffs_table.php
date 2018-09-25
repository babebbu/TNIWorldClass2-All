<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->string('student_id', 10);
            $table->string('facebook_id');
            $table->primary('student_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('nickname');
            $table->string('email');
            $table->string('mobile',10);
            $table->string('shirt_size',3);
            $table->text('congenital_disease');
            $table->text('food_allergies');
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
        Schema::drop('staffs');
    }
}
