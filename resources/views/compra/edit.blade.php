@extends('admin.layout')
@section('content')
<h1>EDITAR DETALLE DE COMPRA</h1>
<form action="{{route('compra.update', $compra)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">CANTIDAD DE PRODUCTOS COMPRADOS</label>
        <input type="text" name="cantidad_compra" class="form-control" value="{{$compra->cantidad_compra}}">
    </div>
    <div class="form-group">
        <label for="">FECHA DE LA COMPRA</label>
        <input type="text" name="fecha_compra" class="form-control" value="{{$compra->fecha_compra}}">
    </div>
   <div class="form-group">
        <label for="">COSTO DE IMPORTACION TOTAL</label>
        <input type="text" name="costo_importacion_total" class="form-control" value="{{$compra->costo_importacion_total}}">
    </div>
    <div class="form-group">
        <label for="">SubTotal COMPRA</label>
        <input type="text" name="SubTotal" class="form-control" value="{{$compra->SubTotal}}">
    </div>
    <div class="form-group">
        <label for="">COSTO TOTAL DE LA COMPRA</label>
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

    <button class="btn btn-primary">ACTUALIZAR DETALLE DE COMPRA</button>
</form>
    
@endsection