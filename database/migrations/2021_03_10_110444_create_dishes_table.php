<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('dish_name');
            $table->string('dish_img');
            $table->string('dish_description');
            $table->float('dish_price',5,2);
            $table->boolean('dish_discount');
            $table->float('dish_rating',2,1);
            $table->string('dish_menu_class');
            $table->string('dish_discount_id');
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
        Schema::dropIfExists('dishes');
    }
}
