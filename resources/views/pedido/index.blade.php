@extends('admin.layout')
@section('content_title')
    <div class="d-flex justify-content-between pt-5 px-5 align-items-center">
        <h2>Lista de pedidos</h2>
        <a href="{{route('pedido.create')}}" class="btn btn-primary">Nuevo</a>
    </div>
@endsection
@section('content')
    <table class="table text-center">
        <thead>
            <tr>
                <td>ID</td>
                <td>FECHA ENTREGA</td>
                <td>FECHA DEVOLUCION</td>
                <td>CANTIDAD RETENIDA</td>
                <td>CANTIDAD DEVUELTA</td>
                <td>PRODUCTO</td>
                <td>ESTADO</td>
                <td class="text-left">ACCIONES</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
            <tr>
                <td>{{$pedido->id}}</td>
                <td>{{$pedido->fecha_entrega}}</td>
                <td>{{$pedido->fecha_devolucion}}</td>
                <td>{{$pedido->cantidad_retenida}}</td>
                <td>{{$pedido->cantidad_devuelta}}</td>
                <td>{{$pedido->productos->nombre_producto}}</td>
                <td>
                    <p class="badge badge-{{ ($pedido->estado_p > 0 )? 'success' : 'warning' }}">
                        {{ ($pedido->estado_p > 0 )? 'entregado' : 'pendiente' }}
                    </p>
                </td>
                <td>
                    <div class="d-flex justify-content-begin">
                    <form action="{{route('pedido.edit', $pedido->id)}}">
                    <button class="btn btn-success btn-sm mr-1">EDITAR</button>
                    </form>
                    <form action="{{route('pedido.destroy', $pedido->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">ELIMINAR</button>
                    </form>
                    </div>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection