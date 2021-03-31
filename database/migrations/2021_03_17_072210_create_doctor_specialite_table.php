<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorSpecialiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_specialites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->Integer('specialite_id');
            $table->foreign('specialite_id')->references('id')->on('specialites');
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
        Schema::dropIfExists('doctor_specialites');
    }
}
