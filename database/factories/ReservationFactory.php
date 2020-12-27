<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reservation;
use Faker\Generator as Faker;


$factory->define(Reservation::class, function (Faker $faker) {
    $faker = \Faker\Factory::create('ja_JP');

    return [
        'reservation_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '2021-06-30')->format('Y-m-d'),
        'time_id' => rand(1, 9),  
        'course_id' => rand(1, 8),
        'name' => $faker->name,
        'age' => rand(18, 90),
        'gender' => rand(1, 2),
        'email' => $faker->safeEmail,
        'phone_number' => $faker->regexify('[0-9]{9}')
    ];
});
