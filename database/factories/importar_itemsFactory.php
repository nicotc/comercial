<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\importar_items;
use Faker\Generator as Faker;

$factory->define(importar_items::class, function (Faker $faker) {

    return [
        'order_item_name' => $faker->text,
        'order_item_type' => $faker->word,
        'order_id' => $faker->word
    ];
});
