<?php

use App\Item;
use App\Loan;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Loan::class, function (Faker $faker) {
    $item_id = $faker->unique()->numberBetween(1, 150);
    $end_date = Carbon::now();

    return [
        'end_date' => $end_date,
        'expected_end_date' => Carbon::createFromFormat('Y-m-d H:i:s', $end_date)->addDays(Item::find($item_id)->max_loan_duration),
        'returned' => $faker->numberBetween(0, 1),
        'user_id' => factory(User::class)->create()->id,
        'item_id' => $item_id
    ];
});
