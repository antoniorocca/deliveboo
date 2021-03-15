<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('img')->nullable();
            $table->string('location')->nullable();
            $table->string('opening_time')->nullable();
            $table->string('closure_time')->nullable();
            $table->boolean('free_shipping')->default(true);
            $table->float('price_shipping', 4,2)->nullable();
            $table->float('quality', 2,1)->nullable();
            $table->unsignedBigInteger('dish_id')->nullable();
            $table->foreign('dish_id')->references('id')->on('dishes');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('restaurants');
    }
}
