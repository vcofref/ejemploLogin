@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($message))
    <div class="alert alert-primary">
        {{ $message }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Listar Producto</div>
                <div class="card-body">
                    <div class="row">
                        @foreach($productos as $producto)
                        <div class="col-3">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                    @if(Storage::disk('imagenes')->has($producto->imagen))
                                        <img src="{{ url('miniatura/'.$producto->imagen) }}" class="img-fluid rounded-start" alt="...">
                                    @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                                            <p class="card-text">  {{ $producto->precio }}</p>
                                            <p class="card-text">  {{ $producto->sucursal->nombre }}</p>
                                            <p class="card-text"><small class="text-muted">{{ $producto->created_at == $producto->updated_at  ?  "Creado hace " .$producto->created_at->diffForHumans(null, true) : "Actualizado hace " . $producto->updated_at->diffForHumans(null, true) }}</small></p>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="float-right">
                                            <a href="#eliminarModal{{$producto->id}}" role="button" class="btn btn-sm btn-danger" data-toggle="modal">Eliminar</a>
                                        </div>
                                        <div id="eliminarModal{{$producto->id}}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">¿Estás seguro?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Seguro que quieres borrar el producto {{ $producto->nombre }}?</p>
                                                        <p class="text-warning"><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <a href="{{ url('eliminarProducto/'.$producto->id) }}" type="button" class="btn btn-danger">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
<<<<<<< HEAD
                                        </div>  

                                        <div class="float-left">
                                            <a href="#editarModal{{$producto->id}}" role="button" class="btn btn-sm btn-warning" data-toggle="modal">Editar</a>
                                        </div>
                                        <div id="editarModal{{$producto->id}}" class="modal fade" tabindex="0">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ url("/updateProducto/$producto->id")}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('POST')
=======
                                            <div class="card-footer">
                                            <a href="#eliminarModal{{$producto->id}}" role="button" class="btn btn-sm btn-danger" data-toggle="modal">Eliminar</a>
                                            <a href="#editarModal{{$producto->id}}" role="button" class="btn btn-sm btn-success" data-toggle="modal">Actualizar</a>

                                            
                                            <!-- Modal / Ventana / Overlay en HTML -->
                                            <div id="eliminarModal{{$producto->id}}" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
>>>>>>> 5067598fa797721183f3bef6c72167690918ff10
                                                        <div class="modal-header">
                                                        </div>
                                                        <div class="modal-body">
<<<<<<< HEAD
                                                            <div class="mb-3">
                                                                <label for="nombre_{{ $producto->id }}" class="form-label">Producto</label>
                                                                <input type="text" name="nombre" id="nombre_{{ $producto->id }}" class="form-control" value="{{ $producto->nombre }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nombre" class="form-label">Precio</label>
                                                                <input type="text" id="precio_{{ $producto->id }}" name="precio" class="form-control" value="{{ $producto->precio }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nombre" class="form-label">Imagen</label>
                                                                <input type="file" id="imagen_{{ $producto->id }}" name="imagen" id="imagen_{{ $producto->id }}" class="form-control form-control-sm">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nombre" class="form-label">Sucursal</label>
                                                                <select id="sucursal_{{ $producto->id }}" name="sucursal" class="form-select">
                                                                    <option selected disabled>Seleccione una Sucursal</option>
                                                                    @foreach($sucursales as $sucursal)
                                                                        <option value="{{ $sucursal->id}}" {{ $producto->sucursal_id == $sucursal->id ? 'selected':'' }} >{{ $sucursal->nombre}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <br>
=======
                                                            <p>¿Seguro que quieres borrar el producto {{ $producto->nombre }}? con </p>
                                                            <p class="text-warning"><small>Si lo borras, nunca podrás recuperarlo.</small></p>
>>>>>>> 5067598fa797721183f3bef6c72167690918ff10
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                            <button type="submit" class="btn btn-primary">Actualizar </button>
                                                        </div>
                                                    </form>
                                                </div>
<<<<<<< HEAD
=======
                                            </div>  
                                           
                                        <div id="editarModal{{$producto->id}}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ url('/updateProducto/'.$producto->id) }}" method="post" enctype="multipart/form-data"> >
                                                    @csrf
                                                    @method ('GET')
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title">¿Estás seguro?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    <p>¿Seguro que quieres actualizar el producto {{ $producto->nombre }}?</p>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Producto</label>
                                                        <input type="text" name="nombre" class="form-control" id="nombre{{ $producto->nombre }}" value="{{ $producto->nombre }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Precio</label>
                                                        <input type="text" name="precio" class="form-control" value="{{ $producto->precio }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Imagen</label>
                                                        <input type="file" name="imagen" id="img{{ $producto->id }}" class="form-control form-control-sm">
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-success">Editar</button>
                                                    </div>
                                                    
                                                    </div>

                                                </form>
                                            </div>
                                        </div>






                                        </div>
                                        
                                        
                                        
>>>>>>> 5067598fa797721183f3bef6c72167690918ff10
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $productos->links('pagination::bootstrap-4') }}  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection