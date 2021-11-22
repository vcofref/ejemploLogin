<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Producto;
use App\Models\Sucursal;

class ProductosController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function listar(){
        $productos = Producto::paginate(3);
        return view('productos.listar')
        ->with('productos', $productos);
    }

    public function agregar(){
        $sucursales = Sucursal::all();
        return view('productos.agregar')
        ->with('sucursales', $sucursales);
    }

    public function guardar(Request $request){

        $validateData = $this->validate($request, [
            'nombre' => 'required|min:3',
            'precio' => 'integer',
            'sucursal' => 'required'
        ]);        
        $producto = new Producto();
        $producto->nombre=$request->input('nombre');
        $producto->precio=$request->input('precio');
        $producto->sucursal_id=$request->input('sucursal');
        $producto->save();

        return $this->listar();
    }
}
