<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {

    $pCordobas  =   $faker->randomFloat($nbMaxDecimals = 2, $min = 35, $max = 700);
    $tCambio    =   $faker->randomFloat($nbMaxDecimals = 4, $min = 35, $max = 36);
    $pDolar     =   $pCordobas / $tCambio;

    return [
        'sku'           => $faker->unique()->numerify('SKU-###'),
        'descripcion'   => $faker->text($maxNbChars = 100),
        'pdolar'        => $pDolar,
        'pcordobas'     => $pCordobas,
        'activo'        => $faker->boolean
    ];
});
