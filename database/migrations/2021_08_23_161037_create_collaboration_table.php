<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaborationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborations', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->integer('course_id')->nullable();
            $table->integer('course_two_id')->nullable();
            $table->integer('f_student_id')->nullable();
            $table->integer('s_student_d')->nullable();
            $table->integer('hours')->nullable();
            $table->integer('status')->nullable();
            $table->integer('schoolyear_id')->nullable();
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
        Schema::dropIfExists('collaborations');
    }
}
