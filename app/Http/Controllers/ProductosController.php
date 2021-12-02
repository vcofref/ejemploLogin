<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;

use App\Models\Producto;
use App\Models\Sucursal;

use function PHPUnit\Framework\isEmpty;

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

    public function index($id){
        $sucursales = Sucursal::all();
        $producto = Producto::find($id);
        return view('productos.editar')
        ->with(
            array(
                'sucursales' => $sucursales,
                'producto' => $producto
            ));
    }

    public function editar($id){
        $producto = Producto::find($id);
        if($producto){
            $producto->delete();
            $message="Producto eliminado correctamente";
        }else{
            $message="El producto no fue eliminado";
        }

        $productos = Producto::paginate(8);
        return view('productos.listar')
        ->with(
            array(
                'messageError' => $message,
                'productos' => $productos
            ));
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
        
        $message="Producto agregado correctamente";
        $producto->save();
        
        $productos = Producto::paginate(8);

        return view('productos.listar')->with(
            array(
                'messageAdd' => $message,
                'productos' => $productos
            ));
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
            $message="Producto eliminado correctamente";
        }else{
            $message="El producto no fue eliminado";
        }

        $productos = Producto::paginate(8);
        return view('productos.listar')
        ->with(
            array(
                'messageError' => $message,
                'productos' => $productos
            ));
    }

    public function editProducto(Request $request){
        $producto = Producto::find($request->id);

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->sucursal_id= $request->sucursal;
        $imagen = $request->file('imagen');
        if($imagen){
            \Storage::disk('imagenes')->delete($producto->imagen);
            $imagen_path=time().'-'.$imagen->getClientOriginalName();
            \Storage::disk('imagenes')->put($imagen_path, \File::get($imagen));
            $producto->imagen=$imagen_path;
        }
        $producto->save();


        $messageEdit="Producto editado correctamente";
        $productos = Producto::paginate(8); 
        return view('productos.listar')->with(
            array(
                'messageEdit' => $messageEdit,
                'productos' => $productos
            ));
            
    }
}
