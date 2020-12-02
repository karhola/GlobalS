@extends('admin.layout')
@section('content')
    <h1>REGISTRO DE COMPRA</h1>
<form action="{{route('compra.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">INGRESE LA FECHA DE LA COMPRA </label>
        <input type="date" name="fecha_compra" class="form-control">
    </div>
    <button class="btn btn-primary">GUARDAR COMPRA</button>
</form>

@endsection