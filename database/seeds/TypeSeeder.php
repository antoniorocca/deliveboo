<?php

use Illuminate\Database\Seeder;

use App\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $type = ['Italiana', 'Thailandese', 'Cinese', 'Giapponese', 'Messicana', 'Fast Food', 'Poke', 'Gelati'];
        foreach ($type as $value) {
            $newType = new Type;
            $newType->type = $value;
            $newType->save();
        }
    }
}
