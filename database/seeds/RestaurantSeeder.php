<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

      for ($i=0; $i < 10; $i++) {
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = ($i+1);
        $newRestaurant->name = 'restaurant'.($i+1);
        $newRestaurant->save();
        $newRestaurant->categories()->attach(rand(1,19));
        $newRestaurant->categories()->attach(rand(20,30));
        $newRestaurant->tags()->attach(rand(1,4));
      }

    }
}
