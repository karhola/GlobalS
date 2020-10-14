@extends('admin.layout')
@section('content')
<p>EDITAR CATEGORIA</p>

<form action="{{route('categoria.update', $categoria->id)}}" method="POST">
@method('PUT')
@csrf
<p>INGRESE EL NOMBRE</p>
<input type="text" class="form-control" name="nombre_cate" value="{{$categoria->nombre_categoria}}">
<br>
<button class="btn btn-primary">ACTUALIZAR CATEGORIA</button>
</form>
    
@endsection