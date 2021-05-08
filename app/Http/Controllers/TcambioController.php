<?php

namespace App\Http\Controllers;

use App\Tcambio;
use Illuminate\Http\Request;
use Validator;

class TcambioController extends Controller
{

    //Listar tasa de cambio
    public function index()
    {
        $tcambio = Tcambio::where('fecha',date('Y-m-d'))->get();

        if(is_null($tcambio) || empty($tcambio) || count($tcambio)===0){
            return response()->json(["Mensaje" => "Registro no encontrado"], 404);
        }
        return response()->json($tcambio, 200);
    }

   //Crear tasa de cambio
    public function store(Request $request)
    {

        $rules = [
            'fecha' => 'required|min:10|max:10',
            'tasa' => 'required|min:5|max:5'
        ];

        $validar = Validator::make($request->all(), $rules);

        if($validar->fails()){
            return response()->json($validar->errors(),400);
        }

        $tcambio = Tcambio::create($request->all());
        return response()->json($tcambio,201);

    }

    private function mes($mesVal){
        strtolower($mesVal);

        switch($mesVal){
            case 'enero':
                return '01';
                break;
            case 'febrero':
                return '02';
                break;
            case 'marzo':
                return '03';
                break;
            case 'abril':
                return '04';
                break;
            case 'mayo':
                return '05';
                break;
            case 'junio':
                return '06';
                break;
            case 'julio':
                return '07';
                break;
            case 'agosto':
                return '08';
                break;
            case 'septiembre':
                return '09';
                break;
            case 'octubre':
                return '10';
                break;
            case 'noviembre':
                return '11';
                break;
            case 'diciembre':
                return '12';
                break;
            default:
                return '0';
                break;
        }
    }

    // Listar tasas de cambios por mes
    public function show($val)
    {

        $mes= $this->mes($val);



        //Filtrar por Mes
        $tcambio = Tcambio::whereMonth('fecha', $mes)->get();


        if(is_null($tcambio) || empty($tcambio) || count($tcambio)===0){
            return response()->json(["Mensaje" => "Registro no encontrado"], 404);
        }
        return response()->json($tcambio, 200);
    }

    //Modificar tasa de cambio
    public function update(Request $request, $id)
    {

        $tcambio = Tcambio::find($id);
        if(is_null($tcambio) || empty($tcambio) || count($tcambio)===0){
            return response()->json(["Mensaje" => "Registro no encontrado"], 404);
        }
        $tcambio->update($request->all());
        return response()->json($tcambio, 200);
    }

    //Eliminar tasa de cambio
    public function destroy($id)
    {
        $tcambio = Tcambio::find($id);
        if(is_null($tcambio) || empty($tcambio) || count($tcambio)===0){
            return response()->json(["Mensaje" => "Registro no encontrado"], 404);
        }
        $tcambio->delete();
        return response()->json(null, 200);
    }
}
