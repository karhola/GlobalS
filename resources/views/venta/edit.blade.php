@extends('admin.layout')
@section('content')
    <h1>REGISTRO DE VENTA</h1>
<form action="{{route('venta.update',$venta->id)}}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
          <label for="">INGRESE LA FECHA DE VENTA</label>
          <input type="date" name="fecha_venta" class="form-control" value="{{$venta->fecha_venta}}">
      </div>
      <div class="form-group">
        <label for="">CANTIDAD COMPRA </label>
        <input type="text" name="cantidad" class="form-control" value="{{$venta->cantidad}}">
    </div>
    <div class="form-group">
        <label for="">PRECIO UNITARIO </label>
        <input type="text" name="precio_unitario" class="form-control" value="{{$venta->precio_unitario}}">
    </div>
    <div class="form-group">
        <label for="">TOTAL DE LA VENTA </label>
        <input type="text" name="total_venta" class="form-control" value="{{$venta->total_venta}}">
    </div>
    <div class="form-group">
        <label for="">SELECCIONE AL PROMOTOR</label>
        <select name="promotor_id" id="" class="custom-select">
            @foreach ($promotors as $promotor)
                <option value="{{$promotor->id}}"  {{  $promotor->id ==$venta->promotor_id ? 'selected' : ''}}>
                    {{$promotor->nombre_promotor}}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">ACTUALIZAR VENTA</button>
</form>

@endsection