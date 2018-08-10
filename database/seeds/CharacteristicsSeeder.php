<?php

use App\Characteristic;
use Illuminate\Database\Seeder;

class CharacteristicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

   private $array = ['diameter', 'width', 'profile', 'season', 'ships', 'PCD', 'DIA', 'color'];


    public function run()
    {
        foreach ($this->array as $a) {
            Characteristic::create(['name' => $a, 'slug' => $a]);
        }
    }
}
