@extends('admin.layout')
@section('content')
    <h1>REGISTRO DE PRODUCTOS</h1>
<form action="{{route('producto.store')}}" method="POST"
enctype="multipart/form-data">
@csrf
    <div class="form-group">
    <label for="">IMAGEN</label>
    <input type="file" name="pfoto">
    </div>
   
    <div class="form-group">
        <label for="">NOMBRE DEL PRODUCTO</label>
        <input type="text" name="nombre_producto" class="form-control">
    </div>
    <div class="form-group">
        <label for="">DESCRIPCION</label>
        <input type="text" name="descripcion_producto" class="form-control">
    </div>
    <div class="form-group">
        <label for="">PRECIO DE COMPRA</label>
        <input type="text" name="pcompra_producto" class="form-control">
    </div>
    <div class="form-group">
        <label for="">PRECIO DE VENTA</label>
        <input type="text" name="pventa_producto" class="form-control">
    </div>
    <div class="form-group">
        <label for="">STOCK</label>
        <input type="text" name="stock_producto" class="form-control">
    </div>
    <div class="form-group">
        <label for="">SELECCIONE LA CATEGORIA</label>
        <select name="categoria_id" id="" class="custom-select">
            @foreach ($categorias as $categoria)
        <option value="{{$categoria->id}}">
            {{$categoria->nombre_categoria}}
        </option>
                
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">GUARDAR PRODUCTO</button>
</form>
@endsection