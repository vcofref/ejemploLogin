@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($messageError))
    <div class="alert alert-danger">
        {{ $messageError }}
    </div>
    @elseif(isset($messageAdd))
    <div class="alert alert-success">
        {{ $messageAdd }}
    </div>
    @elseif(isset($messageEdit))
    <div class="alert alert-primary">
        {{ $messageEdit }}
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
                            <div class="card mb-3" style="max-width: 540px; min-height: 243px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        @if(Storage::disk('imagenes')->has($producto->imagen))
                                        <img src="{{ url('miniatura/'.$producto->imagen) }}" class="img-fluid rounded-start" alt="...">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body" style="min-height: 192px;">
                                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                                            <p class="card-text">$ {{ $producto->precio }}</p>
                                            <p class="card-text">{{ $producto->sucursal->nombre }}</p>
                                            @if($producto->created_at < $producto->updated_at)
                                                <p class="card-text"><small class="text-muted">{{ \FormatTime::LongTimeUpdate($producto->updated_at) }}</small></p>
                                                @else
                                                <p class="card-text"><small class="text-muted">{{ \FormatTime::LongTimeFilter($producto->created_at) }}</small></p>

                                                @endif
                                        </div>
                                    </div>
                                    <div class="card-footer" style="min-height: 49px;">
                                        <a href="#eliminarModal{{$producto->id}}" role="button" class="btn btn-sm btn-danger" data-toggle="modal">Eliminar</a>
                                        <a href="#editarModal{{$producto->id}}" role="button" class="btn btn-sm btn-warning" data-toggle="modal">Editar</a>

                                        <!-- Modal / Ventana / Overlay en HTML -->
                                        <div id="eliminarModal{{$producto->id}}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title ">¿Estás seguro?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Seguro que quieres borrar el producto {{ $producto->nombre }}?</p>
                                                        <p><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <a href="{{ url('eliminarProducto/'.$producto->id) }}" type="button" class="btn btn-danger">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="editarModal{{$producto->id}}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">¿Estás seguro?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Seguro que quieres editar el producto {{ $producto->nombre }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <a href="{{ url('editar/'.$producto->id) }}" type="button" class="btn btn-warning">Editar</a>
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