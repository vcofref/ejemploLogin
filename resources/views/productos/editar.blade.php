@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar producto</div>
                <div class="card-body">
                    <form action="{{ url('/actualizarProducto')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{ $producto->id }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Producto</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Precio</label>
                            <input type="text" name="precio" class="form-control" value="{{ $producto->precio }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Imagen actual:</label>
                            <input type="text" disabled name="imagenAct" id="imagenAct" value="{{ $producto->imagen }}" class="form-control form-control-sm">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Imagen</label>
                            <input type="file" name="imagen" id="imagen" class="form-control form-control-sm">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Sucursal</label>
                            <select name="sucursal" class="form-select">
                                @foreach($sucursales as $sucursal)
                                @if($sucursal->id == $producto->sucursal_id)
                                <option selected value="{{ $sucursal->id }}"> {{ $sucursal->nombre}} </option>
                                @continue
                                @endif
                                
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