<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('services_id')->unsigned();
            $table->foreign('services_id')->references('id')->on('gaming_services');
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('gaming_services_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_category');
    }
}
