@extends('admin.layout')
@section('content')
    <h1>REGISTRO DE VENTA</h1>
<form action="{{route('venta.store')}}" method="POST">
      @csrf
      <div class="form-group">
          <label for="">INGRESE LA FECHA DE VENTA</label>
          <input type="date" name="fecha_venta" class="form-control">
      </div>
      <div class="form-group">
        <label for="">CANTIDAD COMPRA </label>
        <input type="text" name="cantidad" class="form-control">
    </div>
    <div class="form-group">
        <label for="">PRECIO UNITARIO </label>
        <input type="text" name="precio_unitario" class="form-control">
    </div>
    <div class="form-group">
        <label for="">TOTAL DE LA VENTA </label>
        <input type="text" name="total_venta" class="form-control">
    </div>
    <div class="form-group">
        <label for="">SELECCIONE AL PROMOTOR</label>
        <select name="promotor_id" id="" class="custom-select">
            @foreach ($promotors as $promotor)
                <option value="{{$promotor->id}}">
                    {{$promotor->nombre_promotor}}
                </option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">GUARDAR VENTA</button>
</form>

@endsection