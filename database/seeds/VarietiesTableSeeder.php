<?php

use Illuminate\Database\Seeder;

class VarietiesTableSeeder extends Seeder
{
 
    public function run()
    {
        //
        factory('App\Variety', 4)->create();
    }
}
