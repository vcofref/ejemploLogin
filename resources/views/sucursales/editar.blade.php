@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Sucursal</div>
                <div class="card-body">
                    <form action="{{ url('/actualizarSucursal')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Nombre de la Sucursal</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $sucursal->nombre }}">
                            <input type="hidden" name="id" value="{{ $sucursal->id }}">
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