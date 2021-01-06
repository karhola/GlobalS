@extends('admin.layout')
@section('content')

<p>EDITAR PEDIDO</p>

<form action="{{route('pedido.update',$pedido)}}" method="POST">
    @csrf
    @method('PUT')
    <label>FECHA DE ENTREGA</label>
    <input type="date" class="form-control" name="fecha_entrega" value="{{$pedido->fecha_entrega}}">
    <label>FECHA DE DEVOLUCION</label>
    <input type="date" class="form-control" name="fecha_devolucion" value="{{$pedido->fecha_devolucion}}">
    <label>CANTIDAD RETENIDA</label>
    <input type="text" class="form-control" name="total_cantidad_retenida" value="{{$pedido->total_cantidad_retenida}}">
    <label>CANTIDAD DEVUELTA</label>
    <input type="text" class="form-control" name="total_cantidad_devuelta" value="{{$pedido->total_cantidad_devuelta}}">
    <label>ESTADO</label>
    <input type="boolean" class="form-control" name="estado_p" value="{{$pedido->estado_p}}">
    <br>
    <button class="btn btn-primary">ACTUALIZAR PROMOTOR</button>
</form>
    
@endsection