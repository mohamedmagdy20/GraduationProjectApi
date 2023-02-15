<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientTranslateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('patient_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->unique(['patient_id', 'locale']);
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
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
        Schema::dropIfExists('patient_translate');
    }
}
