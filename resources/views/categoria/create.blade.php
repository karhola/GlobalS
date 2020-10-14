@extends('admin.layout')
@section('content')

<p>NUEVO CATEGORIA</p>

<form action="{{route('categoria.store')}}" method="POST">
    @csrf
    <p>NOMBRE CATEGORIA</p>
    <input type="text" class="form-control" name="nombre_cate">

    <br>
    <button class="btn btn-primary">GUARDAR CATEGORIA</button>
</form>
    
@endsection