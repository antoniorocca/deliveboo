<?php

use Illuminate\Database\Seeder;

use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tag = ['Consegna gratuita', 'Nuovo', 'Sconto 10%', 'Sconto 20%',];
        foreach ($tag as $value) {
            $newTag = new Tag;
            $newTag->name = $value;
            if ($value == 'Nuovo') {
                $newTag->color = 'blue';
            } elseif ($value == 'Consegna gratuita') {
                $newTag->color = 'yellow';
            } else {
                $newTag->color = 'red';
            }
            $newTag->save();
        }
    }
}
