@extends('admin.layout')
@section('content')
    <h1>REGISTRO DE COMPRA</h1>
<form action="{{route('compra.store')}}" method="POST">
      @csrf
      <div class="form-group">
          <label for="">INGRESE LA CANTIDAD DE LA COMPRA</label>
          <input type="text" name="cantidad_compra" class="form-control">
      </div>
      <div class="form-group">
        <label for="">INGRESE LA PRECIO DE LA COMPRA </label>
        <input type="text" name="precio_compra" class="form-control">
    </div>
    <div class="form-group">
        <label for="">INGRESE LA FECHA DE LA COMPRA </label>
        <input type="date" name="fecha_compra" class="form-control">
    </div>
    <div class="form-group">
        <label for="">INGRESE LA TOTAL DE LA COMPRA </label>
        <input type="text" name="total_compra" class="form-control">
    </div>
    <div class="form-group">
        <label for="">SELECCIONE AL PROVEEDOR</label>
        <select name="proveedor_id" id="" class="custom-select">
            @foreach ($proveedors as $proveedor)
                <option value="{{$proveedor->id}}">
                    {{$proveedor->nombre_proveedor}}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">GUARDAR COMPRA</button>
</form>

@endsection