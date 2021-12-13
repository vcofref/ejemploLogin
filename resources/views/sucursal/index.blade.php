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
                <div class="card-header">
                    <span>
                        Listar Sucursales
                    </span>    
                    <div class="float-right">
                        <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#crear_sucursal_modal">
                            Crear Sucursal
                        </button>
                    </div>
                    <div class="modal fade" id="crear_sucursal_modal" tabindex="-1" aria-labelledby="crear_sucursal_modalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <form action="{{ url('sucursal/store') }}" method="post">
                                        @method('POST')
                                        @csrf
                                        <h5 class="modal-title" id="crear_sucursal_modalLabel">Creación de sucursal</h5>
                                        </div>
                                        <div class="modal-body">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" name="nombre" id="crear_nombre" value="{{ old('nombre') }}" class="form-control">
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Crear sucursal</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                            <div class="row">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th colspan="2"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sucursales as $sucursal)
                                        <tr>
                                            <th scope="row">{{ $sucursal->id }}</th>
                                            <td>{{ $sucursal->nombre }}</td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-md btn-warning" data-toggle="modal" data-target="#sucursal_modal_{{ $sucursal->id }}">
                                                    Editar
                                                </button>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="sucursal_modal_{{ $sucursal->id }}" tabindex="-1" aria-labelledby="sucursal_modal_{{ $sucursal->id }}Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ url('sucursal/update/'.$sucursal->id) }}" method="post">
                                                            @method('PUT')
                                                            @csrf
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="sucursal_modal_{{ $sucursal->id }}Label">Edición de sucursal</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <label for="nombre">Nombre</label>
                                                                        {{-- El id de los input dentro del modal tienen que tener  un identificador único, por regla de JS --}}
                                                                        <input type="text" name="nombre" id="nombre_{{ $sucursal->id }}" value="{{ $sucursal->nombre }}" class="form-control">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <form action="{{ url('sucursal/delete/'.$sucursal->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"  class="btn btn-md btn-danger"> Eliminar </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <div class="d-flex justify-content-center">
                        {{ $sucursales->links('pagination::bootstrap-4') }}  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection