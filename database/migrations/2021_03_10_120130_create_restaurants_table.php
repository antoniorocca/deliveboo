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
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('img')->nullable();
            $table->string('location', 30)->nullable();
            $table->string('opening_time', 20)->nullable();
            $table->string('closure_time', 20)->nullable();
            $table->boolean('free_shipping')->default(true);
            $table->float('price_shipping', 2,1)->nullable();
            $table->float('quality', 20)->nullable();
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
