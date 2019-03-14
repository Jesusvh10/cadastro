<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
           
           

            $table->bigIncrements('id');
            $table->timestamp('date');
            $table->string('tipe');
            //$table->unsignedBigInteger('student_id');
            //$table->foreign('student_id')->references('id')->on('students');
            //$table->unsignedBigInteger('module_id');
            //$table->foreign('module_id')->references('id')->on('modules');
            //$table->unsignedBigInteger('teacher_id');
            //$table->foreign('teacher_id')->references('id')->on('teachers');
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
        Schema::dropIfExists('absences');
    }
}
