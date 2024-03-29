<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nombre'    => $faker->name,
        'direccion' =>$faker->address,
        'activo'    =>$faker->boolean
    ];
});
