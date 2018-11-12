<?php

use App\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'nfc_code' => $faker->unique()->uuid,
        'max_loan_duration' => rand(0, 30)
    ];
});
