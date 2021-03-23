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
      $dishes = json_encode(dishes.json)
      $newOrder = new Order;
      $newOrder->restaurant_id = rand(1,10);
      $newOrder->amount = rand(10,100);
      $newOrder->order = serialize($dishes);
      $newOrder->save();

    }
}
