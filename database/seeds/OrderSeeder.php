<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Restaurant;
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
      $rand = rand(1,10);
      $newOrder->restaurant_id = $rand;
      $patti = json_encode(Restaurant::find($rand)->dishes);
      $newOrder->order = serialize($patti);
      $newOrder->amount = rand(10,100);
      $newOrder->save();

    }
}
