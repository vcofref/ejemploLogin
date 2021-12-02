<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Sucursal;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
// use Symfony\Component\HttpFoundation\File\File;

class ProductosController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function listar(){
        $horaActual = new Carbon;
        $productos = Producto::paginate(8);
        $sucursales = Sucursal::all();
        
        return view('productos.listar' , [
            'productos' => $productos,
            'sucursales'  => $sucursales,
            'horaActual'  => $horaActual,
        ] );
    }

    public function agregar(){
        $sucursales = Sucursal::all();
        return view('productos.agregar')
        ->with('sucursales', $sucursales);
    }

    public function guardar(Request $request){
        $this->validate($request, [
            'nombre' => 'required|min:3',
            'precio' => 'integer',
            'sucursal' => 'required',
            'imagen' => 'image',
        ]);        
        $producto = new Producto();
            $producto->nombre   = $request->input('nombre');
            $producto->precio   = $request->input('precio');
        $producto->sucursal_id  = $request->input('sucursal');

        //cargar Imagen
        $imagen = $request->file('imagen');
        if($imagen){
            $imagen_path=time().'-'.$imagen->getClientOriginalName();
            Storage::disk('imagenes')->put($imagen_path, File::get($imagen));
            $producto->imagen=$imagen_path;
        }
        $producto->save();

        return back()->withMessage("Producto guardado satisfactoriamente");
    }

    public function getImagen($filename){
        $file = Storage::disk('imagenes')->get($filename);
        return new Response($file,200);
    }

    public function updateProducto(Request $request , $producto_id){
        $this->validate($request, [
            'nombre' => 'required|min:3',
            'precio' => 'integer',
            'sucursal' => 'required',
            'imagen' => 'image',
        ]);

        $producto = Producto::find( $producto_id );
            $producto->nombre= $request->nombre;
            $producto->precio= $request->precio;
        $producto->save();

        $imagen = $request->file('imagen');
        if($imagen){
            $imagen_path=time().'-'.$imagen->getClientOriginalName();
            Storage::disk('imagenes')->put($imagen_path, File::get($imagen));
            $producto->imagen=$imagen_path;
        }
        $producto->save();
        return back()->withMessage("Producto Actualziado satisfactoriamente, ID del producto: " . $producto_id );
    }

    public function deleteProducto($id){
        $producto = Producto::find($id);
        //Eliminar Imagen
        if($producto){
            Storage::disk('imagenes')->delete($producto->imagen);
            $producto->delete();
            $message="Producto Eliminado Correctamente";
        }else{
            $message="El producto no fue eliminado";
        }

        return back()->withMessage( $message );
    }
}
