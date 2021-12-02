@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($messageError))
    <div class="alert alert-danger">
        {{ $messageError }}
    </div>
    @elseif(isset($messageAdd))
    <div class="alert alert-primary">
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
                <div class="card-header">Sucursales</div>

                <div class="card-body">
                    <div class="row">
                        @foreach($sucursales as $sucursal)
                        <div class="col-3">
                            <div class="card mb-3" style="max-width: 540px; min-height: 160px;">
                                <div class="row g-0">
                                    <div class="col-md-8">
                                        <div class="card-body" style="min-height: 112px;" >
                                            <h5 class="card-title">{{ $sucursal->nombre }}</h5>
                                            @if($sucursal->created_at < $sucursal->updated_at) 
                                            <p class="card-text"><small class="text-muted">{{ \FormatTime::LongTimeUpdate($sucursal->updated_at) }}</small></p>
                                            @else
                                            <p class="card-text"><small class="text-muted">{{ \FormatTime::LongTimeFilter($sucursal->created_at) }}</small></p>
                                            
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer" style="min-height: 49px;" >
                                        <a href="#eliminarModal{{$sucursal->id}}" role="button" class="btn btn-sm btn-danger" data-toggle="modal">Eliminar</a>
                                        <a href="#editarModal{{$sucursal->id}}" role="button" class="btn btn-sm btn-warning" data-toggle="modal">Editar</a>

                                        <!-- Modal / Ventana / Overlay en HTML -->
                                        <div id="eliminarModal{{$sucursal->id}}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">¿Estás seguro?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Seguro que quieres borrar la sucursal {{ $sucursal->nombre }}?</p>
                                                        <p><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <a href="{{ url('eliminarSucursal/'.$sucursal->id) }}" type="button" class="btn btn-danger">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="editarModal{{$sucursal->id}}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">¿Estás seguro?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Seguro que quieres editar la sucursal {{ $sucursal->nombre }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <a href="{{ url('editarSucursal/'.$sucursal->id) }}" type="button" class="btn btn-warning">Editar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>

                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection