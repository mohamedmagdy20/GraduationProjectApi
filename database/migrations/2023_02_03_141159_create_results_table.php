<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pateint_id')->unsigned();
            $table->foreign('pateint_id')->references('id')->on('patient')->onDelete('cascade');
            $table->string('alzhimer_result')->nullable();
            $table->string('brain_result')->nullable();
            $table->string('img')->nullable();
            $table->string('alzhimer_rate')->nullable();
            $table->string('brain_rate')->nullable();
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
        Schema::dropIfExists('results');
    }
}
