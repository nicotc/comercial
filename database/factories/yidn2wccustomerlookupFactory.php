<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\yidn2wccustomerlookup;
use Faker\Generator as Faker;

$factory->define(yidn2wccustomerlookup::class, function (Faker $faker) {

    return [
        'user_id' => $faker->word,
        'username' => $faker->word,
        'first_name' => $faker->word,
        'last_name' => $faker->word,
        'email' => $faker->word,
        'date_last_active' => $faker->date('Y-m-d H:i:s'),
        'date_registered' => $faker->date('Y-m-d H:i:s'),
        'country' => $faker->word,
        'postcode' => $faker->word,
        'city' => $faker->word,
        'state' => $faker->word
    ];
});
