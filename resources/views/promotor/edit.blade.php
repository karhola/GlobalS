@extends('admin.layout')
@section('content')

<p>EDITAR PROMOTOr</p>

<form action="{{route('promotor.update',$promotor)}}" method="POST">
    @csrf
    @method('PUT')
    <label>INGRESE EL NOMBRE COMPLETO</label>
<input type="text" class="form-control" name="nombre_promotor" value="{{$promotor->nombre_promotor}}">
    <label>APELLIDO</label>
    <input type="text" class="form-control" name="apellido_promotor" value="{{$promotor->apellido_promotor}}">
    <label>DIRECCION</label>
    <input type="text" class="form-control" name="direccion_promotor" value="{{$promotor->direccion_promotor}}">
    <label>CELULAR</label>
    <input type="text" class="form-control" name="celular_promotor" value="{{$promotor->celular_promotor}}">
    <label>FECHA DE NACIMIENTO</label>
    <input type="date" class="form-control" name="fecha_nacimiento" value="{{$promotor->fecha_nacimiento}}">
    <label>DOCUMENTO DE IDENTIDAD</label>
    <input type="text" class="form-control" name="ci_promotor" value="{{$promotor->ci_promotor}}">
    <br>
    <button class="btn btn-primary">ACTUALIZAR PROMOTOR</button>
</form>
    
@endsection