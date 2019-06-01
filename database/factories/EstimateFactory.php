<?php

use Faker\Generator as Faker;

$factory->define(App\Estimate::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'source' => null,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'pickup_address_street_1' => $faker->streetAddress,
        'pickup_address_street_2' => $faker->streetAddress,
        'pickup_address_city' => $faker->city,
        'pickup_address_state' => $faker->randomElement(['NJ','PA','DE']),
        'pickup_address_zipcode' => $faker->postcode,
        'destination_address_street_1' => $faker->streetAddress,
        'destination_address_street_2' => $faker->streetAddress,
        'destination_address_city' => $faker->city,
        'destination_address_state' => $faker->randomElement(['NJ','PA','DE']),
        'destination_address_zipcode' => $faker->postcode,
        'move_date_month' => $faker->numberBetween(1,12),
        'move_date_day' => $faker->numberBetween(1,31),
        'move_date_year' => $faker->numberBetween(date('Y'),date('Y')+2),
        'home_type' => $faker->randomKey(\App\Options\HomeType::get()),
    ];
});
