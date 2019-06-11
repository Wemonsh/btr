<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamingServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaming_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('alias');
            $table->string('description')->nullable();
            $table->bigInteger('game_id')->unsigned();
            $table->foreign('game_id')->references('id')->on('games');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gaming_services');
    }
}
