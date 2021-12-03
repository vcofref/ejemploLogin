<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sucursal;

class SucursalesController extends Controller
{
    public function __construct(){
        $this-> middleware('auth'); 
    }


 public function listarS(){
     $sucursales = Sucursal::paginate(4);
     
     return view('sucursales.listarS')
     ->with('sucursales', $sucursales);
 }
 public function agregarS(){
    return view('sucursales.agregarS');
}
public function guardarS(Request $request){
    $validateData = $this-> validate($request, [
    'nombre'=> 'required|min:5']);
    $sucursal = new Sucursal();
    $sucursal -> nombre = $request -> input('nombre'); 
    $sucursal -> save();
    
    return $this-> listarS();
   
}
public function eliminarSucursal($id){
    $sucursal = Sucursal::find($id);
    if ($sucursal) {
        $sucursal -> delete();
        $message = "La sucursal fue eliminada con éxito :)";
    }else{
        $message = "No se pudo eliminar la sucursal :( ";
    }
    $sucursales = Sucursal::paginate(8);
    return view('sucursales.listarS')->with(array(
        'message'=> $message,
        'sucursales' => $sucursales
    ));

}
}
