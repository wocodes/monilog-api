<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Wallet::class, function (Faker $faker) {
    return [
        "available_balance" => $faker->numberBetween(1000, 20000),
        "wallet_type_id" => 1
    ];
});
