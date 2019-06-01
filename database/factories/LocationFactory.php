<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'rule_id' => null,
        'city' => $faker->city,
        'state' => $faker->randomElement(['NJ','PA','DE']),
        'zipcode' => $faker->postcode,
    ];
});
