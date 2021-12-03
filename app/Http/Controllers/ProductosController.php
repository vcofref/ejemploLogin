<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;

use App\Models\Producto;
use App\Models\Sucursal;

class ProductosController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function listar(){
        $productos = Producto::paginate(8);
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


        //cargar Imagen
        $imagen = $request->file('imagen');
        if($imagen){
            $imagen_path=time().'-'.$imagen->getClientOriginalName();
            \Storage::disk('imagenes')->put($imagen_path, \File::get($imagen));
            $producto->imagen=$imagen_path;
        }

        $producto->save();

        return $this->listar();
    }

    public function getImagen($filename){
        $file = \Storage::disk('imagenes')->get($filename);
        return new Response($file,200);
    }

    public function deleteProducto($id){
        $producto = Producto::find($id);
        if($producto){
            //Eliminar Imagen
            \Storage::disk('imagenes')->delete($producto->imagen);
            $producto->delete();
            $message="Producto Eliminado Correctamente";
        }else{
            $message="El producto no fue eliminado";
        }

        $productos = Producto::paginate(8);
        return view('productos.listar')
        ->with(
            array(
                'message' => $message,
                'productos' => $productos
            ));
    }

}
