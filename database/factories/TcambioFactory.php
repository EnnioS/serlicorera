<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tcambio;
use Faker\Generator as Faker;

$factory->define(Tcambio::class, function (Faker $faker) {
    return [
        'Fecha' => $faker->unique()->date($format = 'Y-m-d',  $max = '+1 year'),
        'tasa'  => $faker->randomFloat($nbMaxDecimals = 4, $min = 35, $max = 36.5000)
    ];
});
