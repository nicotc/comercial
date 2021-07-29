<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Porcentajes;
use Faker\Generator as Faker;

$factory->define(Porcentajes::class, function (Faker $faker) {

    return [
        'product_id' => $faker->randomDigitNotNull,
        'porcentaje' => $faker->word
    ];
});
