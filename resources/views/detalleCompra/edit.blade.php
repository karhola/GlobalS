@extends('admin.layout')
@section('content')
<h1>EDITAR DETALLE DE COMPRA</h1>
<form action="{{route('detalleCompra.update', $detalleCompra)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">CANTIDAD DE PRODUCTOS COMPRADOS</label>
        <input type="text" name="cantidad_compra" class="form-control" value="{{$detalleCompra->cantidad_compra}}">
    </div>
    <div class="form-group">
        <label for="">PRECIO TOTAL DE LA COMPRA</label>
        <input type="text" name="total_compra" class="form-control" value="{{$detalleCompra->total_compra}}">
    </div>
    <div class="form-group">
        <label for="">SELECCIONE EL PRODUCTO</label>
        <select name="producto_id" id="" class="custom-select">
            @foreach ($producto as $producto)
            <option value="{{$producto->id}}" {{$producto->id ==$detalleCompra->producto_id ? 'selected' : ''}}>
                {{$producto->nombre_producto}}
            </option>      
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">SELECCIONE AL PROVEEDOR</label>
        <select name="proveedor_id" id="" class="custom-select">
            @foreach ($proveedor as $proveedor)
                <option value="{{$proveedor->id}}" {{  $proveedor->id ==$detalleCompra->proveedor_id ? 'selected' : ''}}>
                    {{$proveedor->nombre_proveedor}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">CONFIRMAR FECHA</label>
        <select name="compra_id" id="" class="custom-select">
            @foreach ($compra as $compra)
                <option value="{{$compra->id}}" {{  $compra->id ==$detalleCompra->compra_id ? 'selected' : ''}}>
                    {{$compra->fecha_compra}}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">ACTUALIZAR DETALLE DE COMPRA</button>
</form>
    
@endsection