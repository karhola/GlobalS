@extends('admin.layout')
@section('content')
    <h1>EDITAR COMPRA</h1>
<form action="{{route('compra.update', $compra)}}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
          <label for="">INGRESE LA CANTIDAD DE LA COMPRA</label>
      <input type="text" name="cantidad_compra" class="form-control" value="{{$compra->cantidad_compra}}">
      </div>
      <div class="form-group">
        <label for="">INGRESE LA PRECIO DE LA COMPRA </label>
        <input type="text" name="precio_compra" class="form-control" value="{{$compra->precio_compra}}">
    </div>
    <div class="form-group">
        <label for="">INGRESE LA FECHA DE LA COMPRA </label>
        <input type="date" name="fecha_compra" class="form-control" value="{{$compra->fecha_compra}}">
    </div>
    <div class="form-group">
        <label for="">INGRESE LA TOTAL DE LA COMPRA </label>
        <input type="text" name="total_compra" class="form-control" value="{{$compra->total_compra}}">
    </div>
    <div class="form-group">
        <label for="">SELECCIONE AL PROVEEDOR</label>
        <select name="proveedor_id" id="" class="custom-select">
            @foreach ($proveedors as $proveedor)
                <option value="{{$proveedor->id}}" {{  $proveedor->id ==$compra->proveedor_id ? 'selected' : ''}}>

                    {{$proveedor->nombre_proveedor}}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">ACTUALIZAR COMPRA</button>
</form>

@endsection