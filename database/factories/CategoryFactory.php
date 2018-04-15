<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->state,
        'hexColour' => $faker->hexcolor,
        'isActive' => 1,
        'isDeleted' => 0
    ];
});
