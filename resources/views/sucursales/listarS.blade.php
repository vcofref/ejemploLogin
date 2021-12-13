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
                <div class="card-header" align="center" >Lista de sucursales actuales</div>
                <div class="card-body">
                            <table class="table">
                                <thead>
                                   <tr>
                                      
                                       <th>Nombre</th>
                                       <th>Acción</th>
                                   </tr>
                                </thead>
                                <tbody>
                                    @foreach($sucursales as $sucursal)
                                    <tr>
                                        
                                        <td>{{$sucursal -> nombre}}</td>
                                        <td><a href="#eliminarModal{{$sucursal->id}}" role="button" class="btn btn-sm btn-danger" data-toggle="modal">Eliminar</a>
                                        <a href="#actualizarModal{{ $sucursal->id}}" role="button" class="btn btn-sm btn-success" data-toggle="modal">Cambiar sucursal</a>
                                    
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <div id="eliminarModal{{$sucursal->id}}" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{url('eliminarSucursal/'.$sucursal->id)}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">¿Estás seguro?</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Seguro que quieres borrar la sucursal {{ $sucursal->nombre }}?  </p>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                            <button type="submit"  class="btn btn-md btn-danger"> Eliminar </button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                        <div  id="actualizarModal{{ $sucursal->id }}" tabindex="-1" aria-hidden="true" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ url('actualizar/'.$sucursal->id) }}" method="post">   
                                                            @csrf
                                                            @method('PUT')
                                                                <div class="modal-header">
                                                                    <h3 class="modal-title" id="actualizarModal{{ $sucursal->id }}Label" > Actualizar sucursal</h3>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <label for="nombre">Nueva sucursal</label>
                                                                        <input type="text" name="nombre" id="nombre{{ $sucursal->id }}" value="{{ $sucursal->nombre }}" class="form-control">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar </button>
                                                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            
                            
                                      <div class="d-flex justify-content-center">
                                          {{$sucursales -> links('pagination::bootstrap-4')}}
                                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection