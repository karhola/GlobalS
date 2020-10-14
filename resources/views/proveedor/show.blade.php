@extends('admin.layout')
@section('content')
<div class="col-4">
    <div class="card mt-2 text-center">
        <div class="card-header">
            {{$proveedor->nombre_proveedor}} {{$proveedor->correo_proveedor}}
            
        </div>
        <div class="card-body">
            DIRECCION  : {{$proveedor->direccion_proveedor}} <br>
            TELEFONO : {{$proveedor->telefono_proveedor}} <br>
        </div>
        <div class="card-footer form-inline d-flex justify-content-center">
            <form action="/proveedor/{{$proveedor->id}}/edit">
            @method('GET')
            <button class="btn btn-success mr-1">EDITAR</button>
            </form>
        <form action="/proveedor/{{$proveedor->id}}" method="POST">
           @csrf
           @method('DELETE')
           <button class="btn btn-danger">ELIMINAR</button>
        </form>

        </div>

    </div>

</div>
    
@endsection