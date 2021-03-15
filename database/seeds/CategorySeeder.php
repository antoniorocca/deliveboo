<?php

use Illuminate\Database\Seeder;

use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories =
        [
          'Africano' ,
          'Alcol' ,
          'Americano' ,
          'Asiatico' ,
          'Bagel' ,
          'Barbecue' ,
          'Bistecche' ,
          'Bubble tea' ,
          'Burrito' ,
          'Caffetteria' ,
          'Carrefour' ,
          'Cinese' ,
          'Colazione' ,
          'Comfort food' ,
          'Consegna più veloce' ,
          'Coreano',
          'Curry',
          'Dessert' ,
          'Dim Sum',
          'Dolci e dessert',
          'Esclusiva Deliveroo',
          'Gelato' ,
          'Giapponese' ,
          'Hamburger' ,
          'Hawaiano',
          'Healthy' ,
          'I più amati in zona Torino Santa Rita' ,
          'I più votati' ,
          'Indiano',
          'Insalate' ,
          'Italiano' ,
          'Kebab' ,
          'Latinoamericano',
          "McDonald's",
          'Mediterraneo',
          'Messicano',
          'Noodles',
          'Nuovi su Deliveroo' ,
          'Opzioni leggere',
          'Pasta' ,
          'Perfetti per pranzo' ,
          'Piadina',
          'Pizza' ,
          'Poke',
          'Pollo' ,
          'Promospesa',
          'Ramen',
          'Ravioli cinesi',
          'Sandwich' ,
          'Spesa',
          'Street food',
          'Sushi' ,
          'Tacos',
          'Tapas',
          'Teppanyaki',
          'Thailandese',
          'Turco',
          'Vino',
          'Wrap',
        ];
        foreach ($categories as $category) {
            $newCategory = new Category;
            $newCategory->name = $category;
            $newCategory->save();
        }
    }
}
