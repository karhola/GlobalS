@extends('admin.layout')
@section('content')

<p>NUEVO PROMOTOR</p>

<form action="{{route('promotor.store')}}" method="POST">
    @csrf
    <label>INGRESE EL NOMBRE COMPLETO</label>
    <input type="text" class="form-control" name="nombre_promotor">
    <label>APELLIDO</label>
    <input type="text" class="form-control" name="apellido_promotor">
    <label>DIRECCION</label>
    <input type="text" class="form-control" name="direccion_promotor">
    <label>CELULAR</label>
    <input type="text" class="form-control" name="celular_promotor">
    <label>FECHA DE NACIMIENTO</label>
    <input type="date" class="form-control" name="fecha_nacimiento">
    <label>DOCUMENTO DE IDENTIDAD</label>
    <input type="text" class="form-control" name="ci_promotor">
    <br>
    <button class="btn btn-primary">GUARDAR PROMOTOR</button>
</form>
    
@endsection