<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_restaurant', function (Blueprint $table) {
          $table->unsignedBigInteger('restaurant_id');
          $table->foreign('restaurant_id')->references('id')->on('restaurants');
          $table->unsignedBigInteger('category_id');
          $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_restaurant');
    }
}
