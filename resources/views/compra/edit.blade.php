@extends('admin.layout')
@section('content')
    <h1>EDITAR COMPRA</h1>
<form action="{{route('compra.update', $compra)}}" method="POST">
      @csrf
      @method('PUT')
    <div class="form-group">
        <label for="">INGRESE LA FECHA DE LA COMPRA </label>
        <input type="date" name="fecha_compra" class="form-control" value="{{$compra->fecha_compra}}">
    </div>
 <button class="btn btn-primary">ACTUALIZAR COMPRA</button>
</form>

@endsection