<?php

use Faker\Generator as Faker;

$factory->define(App\Ticket::class, function (Faker $faker) {
    return [
        'title'=> $faker->name,
        'description'=> $faker->text
    ];
});
