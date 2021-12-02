<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function index()
    {
        $sucursales = Sucursal::orderBy('id' , 'DESC')->paginate(5);
        return view('sucursal.index' , [ 
            'sucursales' => $sucursales 
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:4|max:255'
        ]);
        Sucursal::create([
            'nombre' => $request->nombre 
        ]);
        return back()->withMessage('Se ha creado la sucursal con nombre: ' . $request->nombre . " correctamente");
    }

    public function update(Request $request, $sucursal_id)
    {
        $request->validate([
            'nombre' => 'required|min:4|max:255'
        ]);
        $sucursal = Sucursal::find( $sucursal_id );
            $sucursal->nombre = $request->nombre;
        $sucursal->save();

        return back()->withMessage('Se ha actualizado la sucursal de código: ' . $sucursal_id);
    }

    public function destroy($sucursal_id)
    {
        $sucursal = Sucursal::with('productos')->findOrFail($sucursal_id);
        
        if( $sucursal->productos->isNotEmpty() ){
            return back()->withError("No se puede eliminar la sucursal, dado que esta posee productos");
        }else{
            $sucursal->delete();
            return back()->withMessage("Se ha eliminado la sucursal con éxito");
        }
    }
}
