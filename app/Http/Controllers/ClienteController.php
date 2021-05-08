<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Cliente;
use Validator;


class ClienteController extends Controller
{
   //Listar todos los clientes
    public function index()
    {
        return response()->json(Cliente::get());
    }

   //Crear cliente
    public function store(Request $request)
    {

        $rules = [
            'nombre' => 'required|min:3'
        ];

        $validar = Validator::make($request->all(), $rules);

        if($validar->fails()){
            return response()->json($validar->errors(),400);
        }

        $cliente = Cliente::create($request->all());
        return response()->json($cliente,201);

    }

    // Buscar los clientes por nombre o códig
    public function show($val)
    {
        if (is_numeric($val)){
            //Filtrar por Id
            $cliente = Cliente::find($val);
        }else{
            //Filtrar por Nombre
            $cliente = Cliente::where('nombre', 'like', $val.'%')->get();
        }

        if(is_null($cliente)){
            return response()->json(["Mensaje" => "Registro no encontrado"], 404);
        }
        return response()->json($cliente, 200);
    }

    //Modificar cliente
    public function update(Request $request, $id)
    {

        $cliente = Cliente::find($id);
        if(is_null($cliente)){
            return response()->json(["Mensaje" => "Registro no encontrado"], 404);
        }
        $cliente->update($request->all());
        return response()->json($cliente, 200);
    }

    //Eliminar cliente
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if(is_null($cliente)){
            return response()->json(["Mensaje" => "Registro no encontrado"], 404);
        }
        $cliente->delete();
        return response()->json(null, 200);
    }
}
