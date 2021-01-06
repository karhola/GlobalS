@extends('admin.layout')
@section('content')

<p>NUEVO PEDIDO</p>

<form action="{{route('pedido.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col">
    <label>FECHA DE ENTREGA</label>
    <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="fecha_entrega">
        </div>
        <div class="col">
    <label>FECHA DE DEVOLUCION</label>
    <input type="date" class="form-control" name="fecha_devolucion">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
    <label>TOTAL RETENID0</label>
    <input type="text" class="form-control" name="total_cantidad_retenida">
        </div>
        <div class="col">
    <label>TOTAL DEVUELT0</label>
    <input type="text" class="form-control" name="total_cantidad_devuelta">
        </div>
    </div>
    <br>
    <label>ESTADO DEL PEDIDO</label>
    <input type="boolean" value="entregado" class="form-control" name="estado_p">
   
    <br>
    <button class="btn btn-primary">GUARDAR PEDIDO</button>
</form>
    
@endsection