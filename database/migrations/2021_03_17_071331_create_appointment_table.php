<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('appointment_date');
            $table->String('appointment_time');
            $table->Integer('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->Integer('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->Integer('sector_id');
            $table->foreign('sector_id')->references('id')->on('sectors');
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
        Schema::dropIfExists('appointments');
    }
}
