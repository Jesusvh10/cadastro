<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFKTbAbsences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absences', function (Blueprint $table) {
           $table->unsignedBigInteger('student_id');
           $table->foreign('student_id')->references('id')->on('students');
           $table->unsignedBigInteger('module_id');
           $table->foreign('module_id')->references('id')->on('modules');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absences', function (Blueprint $table) {
            $table->dropColumn('student_id');
            $table->dropColumn('module_id');
            $table->dropColumn('teacher_id');
        });
    }
}
