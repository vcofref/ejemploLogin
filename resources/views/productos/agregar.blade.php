@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agregar Producto</div>
                <div class="card-body">
                    <form action="{{ url('/guardarProducto')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Producto</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Precio</label>
                            <input type="text" name="precio" class="form-control" value="{{ old('precio') }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Imagen</label>
                            <input type="file" name="imagen" id="imagen" class="form-control form-control-sm">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Sucursal</label>
                            <select name="sucursal" class="form-select">
                                <option selected disabled>Seleccione una Sucursal</option>
                                @foreach($sucursales as $sucursal)
                                    <option value="{{ $sucursal->id}}">{{ $sucursal->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                        <br>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                    @endforeach   
                                </ul>
                            </div>                                                     
                        @endif
                    </form>             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection