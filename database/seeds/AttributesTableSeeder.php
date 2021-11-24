<?php

use App\Attribute;
use Illuminate\Database\Seeder;


class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Attribute::create([
            'name'          =>  'Plant Growth Habit and Canopy',
            'variety_id'          =>  1
        ]);

        // Create a color attribute
        Attribute::create([
            'name'          =>  'Plant Density of Foliage',
            'variety_id'          =>  1
        ]);

        Attribute::create([
            'name'          =>  'Plant Stem Colour',
            'variety_id'          =>  1,
        ]);

        // Create a color attribute
        Attribute::create([
            'name'          =>  'Plant Stem hairiness',
            'variety_id'          =>  1
        ]);
        
    }
}
