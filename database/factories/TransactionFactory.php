<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(\App\Models\Transaction::class, function (Faker $faker) {
    $days = $faker->numberBetween(1, 30);
    return [
        "transaction_type_id" => 1,
        "transaction_mode_id" => 1,
        "amount" => $faker->randomNumber(),
        "transaction_reference" => uniqid("LOC"),
        "locked" => 1,
        "lock_duration_in_days" => $days,
        "lock_duration_end_date" => Carbon::now()->addDays($days),
    ];
});
