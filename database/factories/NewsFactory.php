<?php

use Faker\Generator as Faker;

$factory->define(App\Models\News::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'summary' => $faker->text($maxNbChars = 200),
        'body' => $faker->text($maxNbChars = 800),
        'author' => $faker->name,
        'isActive' => 1,
        'isDeleted' => 0
    ];
});
