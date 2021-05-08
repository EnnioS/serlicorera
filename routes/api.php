<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//RUTAS API
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
