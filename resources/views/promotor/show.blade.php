@extends('admin.layout')

@section('content')
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Fecha entrega</td>
            <td>Fecha devolucion</td>
            <td>Cantidad retenida</td>
            <td>Cantidad devuelta</td>
            <td>Estado</td>
            <td>Producto</td>
            <td>ACCIONES</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($promotor->pedidos as $pedido)
            <tr>
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->fecha_entrega}}</td>
                <td>{{$pedido->fecha_devolucion}}</td>
                <td>{{$pedido->cantidad_retenida}}</td>
                <td>{{$pedido->cantidad_devuelta}}</td>
                <td>{{$pedido->estado_p}}</td>
                <td>{{$pedido->productos->nombre_producto}}</td>
                <td>
                    <a href="{{route('promotor.edit',$promotor)}}">EDITAR</a>
                    <form action="{{route('promotor.destroy',$promotor)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button style="border: none">ELIMINAR</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection