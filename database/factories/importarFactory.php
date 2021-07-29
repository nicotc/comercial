<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\importar;
use Faker\Generator as Faker;

$factory->define(importar::class, function (Faker $faker) {

    return [
        'parent_id' => $faker->word,
        'date_created' => $faker->date('Y-m-d H:i:s'),
        'date_created_gmt' => $faker->date('Y-m-d H:i:s'),
        'num_items_sold' => $faker->randomDigitNotNull,
        'total_sales' => $faker->randomDigitNotNull,
        'tax_total' => $faker->randomDigitNotNull,
        'shipping_total' => $faker->randomDigitNotNull,
        'net_total' => $faker->randomDigitNotNull,
        'returning_customer' => $faker->word,
        'status' => $faker->word,
        'customer_id' => $faker->word
    ];
});
