<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//RUTAS WEB
//CRUD CLIENTE
Route::apiResource('/clientes','ClienteController');

//CRUD PRODUCTO
Route::apiResource('/productos','ProductoController');

//CRUD TASA DE CAMBIO
Route::apiResource('/tcambio','TcambioController');

//CRUD FACTUIRA
Route::apiResource('/facturas','FacturaController');

//REPORTE MENSUAL POR CLIENTE
Route::apiResource('/reportes','FacturaController');

Route::get('/', function () {
    return view('welcome');
});
