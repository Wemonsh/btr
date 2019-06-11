<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('description');
            $table->json('properties')->nullable();
            $table->string('cost');
            $table->json('images')->nullable();

            $table->bigInteger('game_id')->unsigned();
            $table->foreign('game_id')->references('id')->on('games');
            $table->bigInteger('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('gaming_services');

            $table->bigInteger('seller_id')->unsigned();
            $table->foreign('seller_id')->references('id')->on('users');

            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('users');

            $table->boolean('paid')->default(0);

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
        Schema::dropIfExists('orders');
    }
}
