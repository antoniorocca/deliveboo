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

      for ($i=0; $i < 30 ; $i++) {
        // code...
        $newOrder = new Order;

        $newOrder->restaurant_id = $i+1;
        $patti = json_encode(Restaurant::find($i+1)->dishes);
        $newOrder->order = serialize($patti);
        $newOrder->amount = rand(10,100);
        $newOrder->save();
      }


    }
}
