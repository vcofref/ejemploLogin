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
                                                    <p class="card-text">$ {{ $producto->precio }}</p>
                                                    <p class="card-text">{{ $producto->sucursal->nombre }}</p>
                                                    <p class="card-text"><small class="text-muted">{{ \FormatTime::LongTimeFilter($producto->created_at) }}</small></p>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                            <a href="#eliminarModal{{$producto->id}}" role="button" class="btn btn-sm btn-danger" data-toggle="modal">Eliminar</a>
                                            
                                            <!-- Modal / Ventana / Overlay en HTML -->
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