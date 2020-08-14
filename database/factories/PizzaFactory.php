<?php

use Faker\Generator as Faker;

$factory->define(\App\Pizza::class, function (Faker $faker) {
    return [
        'title' => str_random(10),
        'description' => str_random(100),
        'price' => $faker->randomFloat(2, 40, 255 ),
    ];
});
