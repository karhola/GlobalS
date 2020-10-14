@extends('admin.layout')
@section('content')
<p>EDITAR PROVEEDOR</p>

<form action="{{route('proveedor.update', $proveedor->id)}}" method="POST">
@method('PUT')
@csrf
<p>INGRESE EL NOMBRE</p>
<input type="text" class="form-control" name="nombre_prove" value="{{$proveedor->nombre_proveedor}}">
<p>INGRESE EL CORREO</p>
<input type="text" class="form-control" name="correo_prove" value="{{$proveedor->correo_proveedor}}">
<p>INGRESE LA DIRECCION</p>
<input type="text" class="form-control" name="direccion_prove" value="{{$proveedor->direccion_proveedor}}">
<p>INGRESE NUMERO TELEFONICO</p>
<input type="text" class="form-control" name="telefono_prove" value="{{$proveedor->telefono_proveedor}}">
<br>
<button class="btn btn-primary">ACTUALIZAR PROVEEDOR</button>
</form>
    
@endsection