<?php

use Faker\Generator as Faker;

$factory->define(App\Game::class, function (Faker $faker) {
    return [
        'name' => $faker->country,
        'description' => $faker->text,
        'highlighted' => $faker->numberBetween(0, 1),
        'available' => $faker->numberBetween(0, 1),
        'price' => $faker->numberBetween(1, 100),
        'release_date' => $faker->dateTime()
    ];
});