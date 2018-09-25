<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs_jobs', function (Blueprint $table) {
            $table->string('student_id', 10);
            $table->integer('dept_id')->unsigned();
            $table->timestamps();

            $table->primary(['student_id', 'dept_id']);

            $table->foreign('student_id')->references('student_id')->on('staffs');
            $table->foreign('dept_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('staffs_jobs');
    }
}
