<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Variety;
use Faker\Generator as Faker;

$factory->define(Variety::class, function (Faker $faker) {
    return [
        'name'          =>  $faker->company
    ];
});
