<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorDignosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_dignoses', function (Blueprint $table) {
            $table->id();
            $table->string('medicine')->nullable();
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->bigInteger('result_id')->unsigned();
            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');
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
        Schema::dropIfExists('doctor_dignoses');
    }
}
