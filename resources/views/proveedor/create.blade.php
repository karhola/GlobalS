@extends('admin.layout')
@section('content')

<p>NUEVO PROVEEDOR</p>

<form action="{{route('proveedor.store')}}" method="POST">
    @csrf
    <p>INGRESE EL NOMBRE COMPLETO</p>
    <input type="text" class="form-control" name="nombre_prove">
    <p>CORREO ELECTRONICO</p>
    <input type="text" class="form-control" name="correo_prove">
    <p>DIRECCION</p>
    <input type="text" class="form-control" name="direccion_prove">
    <p>NUMERO TELEFONICO o CELULAR</p>
    <input type="text" class="form-control" name="telefono_prove">
    <br>
    <button class="btn btn-primary">GUARDAR PROVEEDOR</button>
</form>
    
@endsection


