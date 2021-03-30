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
            'Americano' ,
            'Asiatico' ,
            'Burrito' ,
            'Caffetteria' ,
            'Cinese' ,
            'Coreano',
            'Dolci e dessert',
            'Gelato' ,
            'Giapponese' ,
            'Hamburger' ,
            'Healthy' ,
            'Indiano',
            'Insalate' ,
            'Italiano' ,
            'Kebab' ,
            'Mediterraneo',
            'Messicano',
            'Pasta' ,
            'Piadina',
            'Pizza' ,
            'Poke',
            'Street food',
            'Sushi' ,
            'Thailandese',
        ];
        foreach ($categories as $category) {
            $newCategory = new Category;
            $newCategory->name = $category;
            $newCategory->save();
        }
    }
}
