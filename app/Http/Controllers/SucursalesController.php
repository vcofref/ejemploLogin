<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function listar(){
        $sucursales = Sucursal::all();
        return view('sucursales.listar')
        ->with('sucursales', $sucursales);
    }

    public function agregar(){
        $sucursales = Sucursal::all();
        return view('sucursales.agregar')
        ->with('sucursales', $sucursales);
    }

    public function guardar(Request $request){

        $validateData = $this->validate($request, [
            'nombre' => 'required|min:3'
        ]);        
        $sucursal = new Sucursal();
        $sucursal->nombre=$request->input('nombre');

        $sucursal->save();
        $message="Sucursal agregada correctamente";

        $sucursales = Sucursal::all();
        return view('sucursales.listar')->with(
            array(
                'messageAdd' => $message,
                'sucursales' => $sucursales
            ));
    }


    public function deleteSucursal($id){
        $sucursal = Sucursal::find($id);
        $pk = Producto::where('sucursal_id', $id)->get();
        if(count($pk)>0){

            $message="La sucursal no pudo ser eliminada ya que posee productos ingresados.";
            
        }else{

            $sucursal->delete();
            $message="Sucursal eliminada correctamente";
        }

        $sucursales = Sucursal::all();
        return view('sucursales.listar')
        ->with(
            array(
                'messageError' => $message,
                'sucursales' => $sucursales
            ));
    }
    public function editSucursal($id){
        $sucursal = Sucursal::find($id);
        return view('sucursales.editar')
        ->with('sucursal', $sucursal);
    }


    public function actualizar(Request $request){

        $sucursal = Sucursal::find($request->id);

        $sucursal->nombre = $request->nombre;
        $sucursal->save();

        $message="Sucursal actualizada correctamente";


        $sucursales = Sucursal::all();
        return view('sucursales.listar')
        ->with(
            array(
                'messageEdit' => $message,
                'sucursales' => $sucursales
            ));
    }
}
