<?php

use Faker\Generator as Faker;

$factory->define(App\Rule::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->word,
        'adjustment_factor' => $faker->numberBetween(0,100),
        'maximum_hours_per_man' => $faker->numberBetween(0,100),
        'minimum_hours_per_man' => $faker->numberBetween(0,100),
        'travel_time' => $faker->numberBetween(0,100),
        'two_men_on_one_truck_price' => $faker->numberBetween(0,100),
        'three_men_on_one_truck_price' => $faker->numberBetween(0,100),
        'four_men_on_one_truck_price' => $faker->numberBetween(0,100),
        'five_men_on_one_truck_price' => $faker->numberBetween(0,100),
        'service_charge_rate' => $faker->numberBetween(0,100),
        'weight_limit_for_quote' => $faker->numberBetween(0,100),
        'mileage_limit_for_quote' => $faker->numberBetween(0,100),
        'allow_drive_time' => $faker->boolean,
        'allow_double_drive_time' => $faker->boolean,
        'truck_weight_limit' => $faker->numberBetween(0,100),
        'additional_truck_service_charge' => $faker->numberBetween(0,100),
        'premium_for_flights_of_stairs' => $faker->numberBetween(0,100),
        'premium_for_parking_restrictions' => $faker->numberBetween(0,100),
        'premium_for_parking_distance' => $faker->numberBetween(0,100),
        'premium_charges' => $faker->numberBetween(0,100),
        'premium_for_elevator' => $faker->numberBetween(0,100),
        'packing_charges' => $faker->numberBetween(0,100),
        'assembling_and_disassembling' => $faker->numberBetween(0,100),
        'availability_saturday' => $faker->boolean,
        'availability_saturday_rate_increase' => $faker->numberBetween(0,100),
        'availability_sunday' => $faker->boolean,
        'availability_sunday_rate_increase' => $faker->numberBetween(0,100),
        'availability_holiday' => $faker->boolean,
        'availability_holiday_rate_increase' => $faker->numberBetween(0,100),
    ];
});
