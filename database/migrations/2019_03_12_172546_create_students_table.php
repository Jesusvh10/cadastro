<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {

   
           
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('surname');
            $table->string('age');
            $table->string('profession');
            //$table->unsignedBigInteger('course_id');
            //$table->foreign('course_id')->references('id')->on('courses');
            //$table->unsignedBigInteger('teacher_id');
            //$table->foreign('teacher_id')->references('id')->on('teachers');
            //$table->unsignedBigInteger('module_id');
            //$table->foreign('module_id')->references('id')->on('modules');
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
        Schema::dropIfExists('students');
    }
}
