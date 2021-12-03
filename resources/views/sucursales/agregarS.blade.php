@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agregar Sucursal</div>
                <div class="card-body">
                    <form action="{{url ('/guardarSucursal')}}" method="POST">
                        @csrf
                        <div-mb-3>
                            <label class="form-label">Sucursal</label>
                            <input type="text" name="nombre" class="form-control" value="{{old ('nombre')}}">
                        </div-mb-3>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Agregar sucursal</button>
                        </div>
                        @if($errors -> any())
                        <div class="alert alert-danger">
                            <ul>
                        @foreach ($errors ->all() as $error)
                        <li>
                        {{$error}}
                        </li>
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
</div>
@endsection