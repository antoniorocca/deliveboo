<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\Restaurant;
use Faker\Generator as Faker;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        for ($i=1; $i < 31 ; $i++) {
            // code...
            for ($x=0; $x < 100; $x++) {
            // code...
            $newOrder = new Order;
            $newOrder->restaurant_id = $i+1;
            $dishes = Restaurant::find($i+1)->dishes;
            $dishesToParse = [$dishes[rand(0,1)],$dishes[rand(0,1)]];
            $patti = json_encode($dishesToParse);
            $newOrder->order = $patti;
            $newOrder->amount = rand(10,100);
            $newOrder->order_date = '202'.rand(0,1).'-'.$months[rand(0,11)].'-'.rand(10,25).' '.$faker->time();
            $newOrder->save();
            }
        }


    }
}
