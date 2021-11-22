@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Listar Producto</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Sucursal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>$ {{ $producto->precio }}</td>
                                <td>{{ $producto->sucursal->nombre }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $productos->links('pagination::bootstrap-4') }}  
                    </div>
                                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection