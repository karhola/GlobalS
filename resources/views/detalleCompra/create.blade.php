@extends('admin.layout')
@section('content')
<h1>DETALLE DE COMPRA</h1>
<form action="{{route('detalleCompra.store')}}" method="POST">
@csrf
    <div class="form-group">
        <label for="">INGRESE LA CANTIDAD DEL PRODUCTO COMPRADO</label>
        <input type="text" name="cantidad_compra" class="form-control">
    </div>
    <div class="form-group">
        <label for="">INGRESE PRECIO TOTAL DE LA COMPRA</label>
        <input type="text" name="total_compra" class="form-control">
    </div>
    <div class="form-group">
        <label for="">SELECCIONE EL PRODUCTO</label>
        <select name="producto_id" id="" class="custom-select">
            @foreach ($producto as $producto)
                <option value="{{$producto->id}}">
                    {{$producto->nombre_producto}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">SELECCIONE EL PROVEEDOR</label>
        <select name="proveedor_id" id="" class="custom-select">
            @foreach ($proveedor as $proveedor)
                <option value="{{$proveedor->id}}">
                    {{$proveedor->nombre_proveedor}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">CONFIRMA LA FECHA DE COMPRA</label>
        <select name="compra_id" id="" class="custom-select">
            @foreach ($compra as $compra)
                <option value="{{$compra->id}}">
                    {{$compra->fecha_compra}}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">GUARDAR COMPRA</button>
</form> 
@endsection