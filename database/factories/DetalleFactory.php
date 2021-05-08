<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Detalle;
use App\Producto;
use App\Factura;
use Faker\Generator as Faker;

$factory->define(Detalle::class, function (Faker $faker) {

    return [
        'factura_id'    =>  $faker->unique()->numberBetween($min = 1, $max = 30),
        'producto_id'   => factory(Producto::class),
        'punitario'     => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 100),
        'cantidad'      => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 100),
        'total'         => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 100)
    ];
});
