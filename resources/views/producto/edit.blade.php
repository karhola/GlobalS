@extends('admin.layout')
@section('content')
<h1>EDITAR PRODUCTO</h1>
<form action="{{route('producto.update', $producto)}}" method="POST"
enctype="multipart/form-data">
    @csrf
    @method('PUT')
      <div class="form-group">
        <label for="">NOMBRE DEL PRODUCTO</label>
        <input type="text" name="nombre_producto" class="form-comtrol" value="{{$producto->nombre_producto}}">
      </div>
      <div class="form-group">
        <label for="">DESCRIPCION</label>
        <input type="text" name="descripcion_producto" class="form-comtrol" value="{{$producto->descripcion_producto}}">
      </div>
      <div class="form-group">
        <label for="">PRECIO DE COMPRA</label>
        <input type="text" name="pcompra_producto" class="form-comtrol" value="{{$producto->pcompra_producto}}">
      </div>
      <div class="form-group">
        <label for="">PRECIO DE VENTA</label>
        <input type="text" name="pventa_producto" class="form-comtrol" value="{{$producto->pventa_producto}}">
      </div>
      <div class="form-group">
        <label for="">STOCK</label>
        <input type="text" name="stock_producto" class="form-comtrol" value="{{$producto->stock_producto}}">
      </div>
      <div class="form-group">
          <label for="">SELECCIONE LA CATEGORIA</label>
          <select name="categoria_id" id="" class="custom-select">
              @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}" {{$categoria->id ==$producto->categoria_id ? 'selected' : ''}}>
                   {{$categoria->nombre_categoria}}
                </option>    
              @endforeach
          </select>
      </div> 
      <div>
        <label for="">IMAGEN</label>
        <input type="file" name="pfoto" class="form-comtrol">
        <br>
         @if($producto->pfoto != "")
        <img src="{{asset('imagenes/'.$producto->pfoto)}}" alt="{{$producto->pfoto}}" height="100px" width="100px">
          @endif
      </div>
       <br>
      <button class="btn btn-primary">ACTUALIZAR PRODUCTO</button>
</form>
@endsection