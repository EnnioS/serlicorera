<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Factura;
use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Factura::class, function (Faker $faker) {

    $subTotal = $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 3500);
    $iva = $subTotal * 0.15;
    $total = $subTotal + $iva;

    return [
        'fact_id'   => $faker->unique()->numberBetween($min = 1, $max = 30),
        'cliente_id'=> factory(Cliente::class),
        'subtotal'  => $subTotal,
        'iva'       => $iva,
        'total'     => $total
    ];
});
