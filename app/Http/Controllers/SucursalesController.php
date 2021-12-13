<?php

namespace App\Http\Controllers;

use App\Models\Producto;
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
    $sucursal = Sucursal::with('productos')->findOrFail(($id));
    if ($sucursal->productos->isNotEmpty()) {
      $message = "No se pudo eliminar la sucursal";
    }else{
        $sucursal -> delete();
        $message = "Eliminada con éxito"; 
    }
    $sucursales = Sucursal::paginate(8);
        return view('sucursales.listarS')
        ->with(
            array(
                'message' => $message,
                'sucursales' => $sucursales
            ));
    

}
public function actualizarSucursal(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required'
    ]);
    $sucursal = Sucursal::find( $id );
        $sucursal->nombre = $request->nombre;
    $sucursal->save();

    return back();
}
}
