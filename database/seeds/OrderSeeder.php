<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $newOrder = new Order;
      $newOrder->restaurant_id = rand(1,10);
      $patto = Restaurant
      $newOrder->order = serialize($dishes);
      $newOrder->amount = rand(10,100);
      $newOrder->save();

    }
}
