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
            'https://images.immediate.co.uk/production/volatile/sites/30/2020/08/mexican-chicken-burger_1-b5cca6f.jpg?quality=90&resize=440%2C400',
            'https://static.toiimg.com/thumb/msid-50219569,width-1070,height-580,resizemode-75/50219569,pt-32,y_pad-40/50219569.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTU9KSwGB-4oMlRQyIDMjVx2PDhAMt77LP1gQ&usqp=CAU',
            'https://gamechangersmovie.com/wp-content/uploads/2019/09/10_2-1600x1067.jpg',
            'https://gamechangersmovie.com/wp-content/uploads/2019/09/33_2-1400x934.jpg',
            'https://images.immediate.co.uk/production/volatile/sites/30/2020/08/baked-chilli-jacket-potatoes-6e7b8d5.jpg?quality=90&resize=500%2C454',
            'https://hips.hearstapps.com/del.h-cdn.co/assets/16/01/delish-baked-potatoes-buffalo-chicken.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNe0CQpJY0GVu8YldEwEs8w7VbrLoDZdGOww&usqp=CAU',
            'https://www.wellplated.com/wp-content/uploads/2020/10/Potato-Curry-recipe.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZAmUVsQCjWhpTj49tgucRF62yCc3uBN0cdg&usqp=CAU',
            'https://littlesunnykitchen.com/wp-content/uploads/2019/07/Sweet-potato-curry-4.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTs3vOSBRlKdj3I2GJklnXj9uVNhjLTCnVHEg&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMuuc4zRs6jf0MkEoiGEpHuIQoO6xaaKNdUQ&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTKxqop3TCWS9RPVkWljGBCm8S7TDdR5JiZRA&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYOr1a_XR4zQar5ygDt3myzwvFRprFzJj1eQ&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrTV04d8y3BolNsNZRpI6J4Ha996cyQA20UA&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTNar0NiDRdAaqOYcLD9AjmNxOYKag5zLTggA&usqp=CAU',
            'https://i.pinimg.com/originals/eb/80/ea/eb80ea2db1683bb17055f5d3856e9a7b.jpg',
            'https://img1.10bestmedia.com/Images/Photos/214200/p-Zeerovers4_55_660x440_201404232218.jpg',
            'https://www.favfamilyrecipes.com/wp-content/uploads/2020/06/IMG_7716.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ8UwXwEjypuqInhcYTK45RN_DLDtLLhYoCvA&usqp=CAU',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRe5WIhb7uedYp1eClPwxAwHYq-MDM0KfKXlg&usqp=CAU',
            'https://spicetrip.nl/wp-content/uploads/2018/10/Thai-Green-Curry-3.jpg',
            'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqrfquCPIwsSBkIe_msfSrrlQWhft1llfoRQ&usqp=CAU',
        ];

        $names = ['insalata','poke','pizza','hamburger','pasta','toast','sushi','taco'];



        /* Piatti ristorante 1 Pasta, Healthy */

        $names1 = ["", "", "", "", "", "", "", "", "", ""];
        $images1 = ["", "", "", "", "", "", "", "", "", ""];
        $ingred1 = [
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
        ];

        for ($i=0; $i < 10; $i++) {

            $newDish = new Dish;
            $newDish->name = $names1[$i];
            $newDish->img = $images1[$i];
            $newDish->description = $ingred1[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0, 1);
            $newDish->rating = rand(1, 5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id = 1;

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();

        }
        
        /* //Piatti ristorante 1 Pasta, Healthy //*/



        /* ciclo for */

        for ($i=0; $i < 310; $i++) {
            $newDish = new Dish;
            $newDish->name = $names[rand(0,7)];
            $newDish->img = $images[rand(0,25)];
            $newDish->description = $faker->sentence();
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->discount = rand(0,1);
            $newDish->rating = rand(1,5);
            $newDish->menu_class = "";
            $newDish->discount_id = "";
            $newDish->restaurant_id =rand(1,31);

            $dish = Dish::all();
            $slugs = array();

            foreach ($dish as $value) {
                array_push($slugs, $value->slug);
            }

            do {
                $numb = rand(100, 1000);
                $slug = Str::slug($newDish->name) . $newDish->restaurant_id . $numb;
            } while (in_array($slug, $slugs));

            $newDish->slug = $slug;
            $newDish->save();
        }


    }
}
