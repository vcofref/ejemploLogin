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
                                        <a href="#" role="button" class="btn btn-sm btn-success" data-toggle="modal">Cambiar sucursal</a>
                                    
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <div id="eliminarModal{{$sucursal->id}}" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title">¿Estás seguro?</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>¿Seguro que quieres borrar la sucursal {{ $sucursal->nombre }}?</p>
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                            <a href="{{ url('eliminarSucursal/'.$sucursal->id) }}" type="button" class="btn btn-danger">Sí</a>
                                                        </div>
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