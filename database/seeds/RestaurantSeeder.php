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





      for ($i=0; $i < 10; $i++) {
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = ($i+1);
        $newRestaurant->name = 'restaurant'.($i+1);
        $newRestaurant->description = $faker->realText($maxNbChars = 100, $indexSize = 2);
        $newRestaurant->phone_number = $faker->phoneNumber();
        $newRestaurant->opening_time = rand(15,18);
        $newRestaurant->closure_time = rand(22,24);
        $newRestaurant->price_shipping = rand(100,300)/100;
        $newRestaurant->img = $images[rand(1,25)] ;
        $newRestaurant->save();
        $newRestaurant->categories()->attach(rand(1,19));
        $newRestaurant->categories()->attach(rand(20,30));
        $newRestaurant->tags()->attach(rand(1,4));
      }

    }
}
