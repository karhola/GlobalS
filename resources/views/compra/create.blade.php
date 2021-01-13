@extends('admin.layout')
@section('content')
<h1>DETALLE DE COMPRA</h1>
<form action="{{route('compra.store')}}" method="POST">
@csrf
    <div class="form-group">
        <label for="">INGRESE LA CANTIDAD DEL PRODUCTO COMPRADO</label>
        <input type="text" name="cantidad_compra" class="form-control">
    </div>
    <div>
        <label for="">INGRESE LA FECHA DE LA COMPRA </label>
        <input type="date"  value="{{ date('Y-m-d') }}" name="fecha_compra" class="form-control">
    </div>
    <div class="form-group">
        <label for="">COSTO DE IMPORTACION TOTAL</label>
        <input type="text" name="costo_importacion_total" class="form-control">
    </div>
    <div class="form-group">
        <label for="">SubTotal COMPRA</label>
        <input type="text" name="SubTotal" class="form-control">
    </div>
    <div class="form-group">
        <label for="">COSTO TOTAL DE LA COMPRA</label>
        <input type="text" name="total_compra" class="form-control">
    </div>
    <div class="form-group">
        <label for="">SELECCIONE EL PROVEEDOR</label>
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