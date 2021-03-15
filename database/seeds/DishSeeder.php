<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Dish;
class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


      $images = [
      'https://www.ilgiornaledelcibo.it/wp-content/uploads/2018/02/cibi-sintetici.jpg',
      'https://www.donnamoderna.com/content/uploads/2020/11/Porzioni-piatto-830x625.jpg',
      'https://static.cookist.it/wp-content/uploads/sites/21/2019/11/piatti-tipici-inglesi-1200x1200.jpg',
      'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.huffingtonpost.it%2F2016%2F02%2F12%2Fno-cibo-come-cultura_n_9218478.html&psig=AOvVaw0hspnzL9oTGC-fRYHcna-e&ust=1615803456122000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCLDy94zHr-8CFQAAAAAdAAAAABAT',
      'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.casaegiardino.it%2Fcucina%2Fricette%2Fcontorni%2Fcontorni-natalizi-ricette.php&psig=AOvVaw0hspnzL9oTGC-fRYHcna-e&ust=1615803456122000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCLDy94zHr-8CFQAAAAAdAAAAABAc',
      ];

      $names = ['insalata','poke','pizza','hamburger','pasta','toast','sushi','taco'];


      for ($i=0; $i < 10; $i++) {
        $newDish = new Dish;
        $newDish->name = $names[rand(0,7)];
        $newDish->img = $images[rand(0,4)];
        $newDish->description = $faker->sentence();
        $newDish->price = rand(1,10);
        $newDish->discount = rand(0,1);
        $newDish->rating = rand(1,5);
        $newDish->menu_class ='';
        $newDish->discount_id ='';
        $newDish->restaurant_id =rand(10,15);
        $newDish->save();

      }


    }
}
