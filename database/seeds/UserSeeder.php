<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      $newUser = new User;
      $newUser->name = "Admin";
      $newUser->email = "admin@mail.it";
      $newUser->password = Hash::make('password');
      $newUser->address = $faker->address();
      $newUser->p_iva = $faker->iban();
      $newUser->category_id = rand(1, 57);
      $newUser->save();
      
      for ($i=0; $i < 30 ; $i++) {
        $newUser = new User;
        $newUser->name = "M'c ".$faker->name();
        $newUser->email = $faker->email();
        $newUser->password = Hash::make('password');
        $newUser->address = $faker->address();
        $newUser->p_iva = $faker->iban();
        $newUser->category_id = rand(1,57);
        $newUser->save();
      }

    }
}
