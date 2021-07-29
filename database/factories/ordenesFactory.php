<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ordenes;
use Faker\Generator as Faker;

$factory->define(ordenes::class, function (Faker $faker) {

    return [
        'order_id' => $faker->randomDigitNotNull,
        'status' => $faker->word,
        'usuario' => $faker->word,
        'nombre' => $faker->word,
        'apellido' => $faker->word,
        'total_ventas' => $faker->word,
        'total_pagado' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
