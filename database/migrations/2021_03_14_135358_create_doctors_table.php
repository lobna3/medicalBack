<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->Integer('id');

            $table->string('city');
            $table->string('country');
            $table->string('codePostal');
            $table->string('status')->nullable();
            $table->string('state')->nullable();
            $table->string('shortBiography');
            $table->Integer('secretary_id');
            $table->foreign('secretary_id')->references('id')->on('users');
            $table->primary('id');
            $table->foreign('id')->references('id')->on('users');

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
        Schema::dropIfExists('doctors');
    }
}
