<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('date');
            $table->String('designation');
              $table->String('file');
            $table->Integer('sector_id')->nullable();
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->Integer('patient_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->Integer('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');
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
        Schema::dropIfExists('documents');
    }
}
