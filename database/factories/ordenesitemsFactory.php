<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ordenesitems;
use Faker\Generator as Faker;

$factory->define(ordenesitems::class, function (Faker $faker) {

    return [
        'ordenes_id' => $faker->randomDigitNotNull,
        'order_item_id' => $faker->randomDigitNotNull,
        'name' => $faker->word,
        'product_id' => $faker->randomDigitNotNull,
        'variation_id' => $faker->randomDigitNotNull,
        'cantidad' => $faker->word,
        'total' => $faker->word,
        'abonado' => $faker->word,
        'personalizacion' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
