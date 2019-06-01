<?php

use Faker\Generator as Faker;

$factory->define(App\AvailabilityEvent::class, function (Faker $faker) {
    $start = \Carbon\Carbon::now()->addDay($faker->randomDigit);
    $end = $start->copy()->addHour(2);
    return [
        'uuid' => $faker->uuid,
        'type' => $faker->word,
        'name' => $faker->jobTitle,
        'description' => $faker->sentence,
        'is_all_day' => $faker->boolean,
        'is_repeatable' => $faker->boolean,
        'start_at' => $start,
        'end_at' => $end,
        'repeat_type' => null,
        'repeat_end_at' => null,
    ];
});
