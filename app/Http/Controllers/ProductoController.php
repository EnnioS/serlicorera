<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Tcambio;

use Illuminate\Http\Request;
use Validator;

class ProductoController extends Controller
{

    //Listar todos los productos activos (Los productos deben incluir precio en córdobas y dólares)
    public function index()
    {
        return response()->json(Producto::where('activo',1)->get());
    }

    //Crear producto

    public function store(Request $request)
    {
        $rules = [
            'sku' => 'required|min:7|max:7',
            'descripcion' => 'required|min:5',
            'pdolar' => 'required',
            'pcordobas' => 'required',
        ];
        $validar = Validator::make($request->all(), $rules);

        if($validar->fails()){
            echo "fail";
            return response()->json($validar->errors(),400);
        }

        $producto = Producto::create($request->all());
        return response()->json($producto,201);

    }


   //Buscar producto por código (SKU) o descripción (Los productos deben incluir la tasa de cambio del dia)
    public function show($val)
    {
        if (preg_match("/^SKU-/i", $val)){
            //Filtrar por SKU
            $producto = Producto::where('sku', '=', $val)->get();
        }else{
            //Filtrar por Descripcion
            $producto = Producto::where('descripcion', 'like', $val.'%')->get();
        }

        if(is_null($producto) || empty($producto) || count($producto)===0){
            return response()->json(["Mensaje" => "Registro no encontrado"], 404);
        }

        $datos = $producto->toArray();
        $todayCambio= Tcambio::where('fecha',date('Y-m-d'))->pluck('tasa');

        //$todayCambio= "35.30";
        if(is_null($producto) || empty($todayCambio) || count($todayCambio)==0){
            //Si no existe la tasa de cambio, esto puede suceder porque el seeder no lo agrego, se aplica de esta manera solo por motivos deprueba de datos
            $todayCambio= "35.30";
        }else{
            $todayCambio = $todayCambio[0];
        }



        $arrayDatas = array();
        $i=0;
        //Incluimos la tasa de cambio del día
        foreach($datos as $data){
            $arrayDatas[$i]["sku"] = $data["sku"];
            $arrayDatas[$i]["descripcion"] = $data["descripcion"];
            $arrayDatas[$i]["pdolar"] = $data["pdolar"];
            $arrayDatas[$i]["pcordobas"] = $data["pcordobas"];
            $arrayDatas[$i]["tcambio"] = number_format($todayCambio, 2);
            $arrayDatas[$i]["created_at"] = $data["created_at"];
            $arrayDatas[$i]["updated_at"] = $data["updated_at"];
            $i++;
        }
       return response()->json($arrayDatas, 200);
    }


//Modificar producto
    public function update(Request $request, $sku)
    {
        $producto = Producto::where('sku', $sku)->update($request->all());
        if(is_null($producto)){
            return response()->json(["Mensaje" => "Registro no encontrado"], 404);
        }

        return response()->json($producto, 200);
    }

   //Eliminar producto
    public function destroy($sku)
    {
        $producto =  Producto::where('sku', $sku)->delete();
        if(is_null($producto) || empty($producto)){
            return response()->json(["Mensaje" => "Registro no encontrado"], 404);
        }
        return response()->json(null, 200);
    }
}
