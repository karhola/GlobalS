@extends('admin.layout')
@section('content')
<div class="d-flex justifi-content-end">
    <a href="{{route('detalleCompra.create')}}" class="btn btn-primary">NUEVO</a>
</div>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>CANTIDAD</td>
            <td>TOTAL</td>
            <td>PRODUCTO</td>
            <td>PROVEEDOR</td>
            <td>FECHA</td>
            <td>ACCIONES</td>
        </tr>
    </thead>
<tbody>
    @foreach ($detalleCompra as $detalleCompra)
    <tr>
        <td>{{$detalleCompra->id}}</td>
        <td>{{$detalleCompra->cantidad_compra}}</td>
        <td>{{$detalleCompra->total_compra}}</td>
        <td>{{$detalleCompra->producto->nombre_producto}}</td>
        <td>{{$detalleCompra->proveedor->nombre_proveedor}}</td>
        <td>{{$detalleCompra->compra->fecha_compra}}</td>
        <td>
            <div class="d-flex justify-content-begin">
            <form action="{{route('detalleCompra.edit', $detalleCompra->id)}}">
                <button class="btn btn-success btn-xs mr-1">EDITAR</button>
            </form>
            <form action="{{route('detalleCompra.destroy', $detalleCompra->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-xs">ELIMINAR</button>
            </form>
            </div>
        </td>
    </tr>   
    @endforeach
</tbody>
</table>  
@endsection