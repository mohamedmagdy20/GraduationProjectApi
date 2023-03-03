<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipsTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tips_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('body')->nullable();
            $table->string('locale')->index();
            $table->bigInteger('tips_id')->unsigned();
            $table->unique(['tips_id', 'locale']);
            $table->foreign('tips_id')->references('id')->on('tips')->onDelete('cascade');
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
        Schema::dropIfExists('tips_translations');
    }
}
