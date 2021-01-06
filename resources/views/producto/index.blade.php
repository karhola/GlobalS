@extends('admin.layout')
@section('content_title')
    <div class="d-flex justify-content-between pt-5 px-5 align-items-center">
        <h2>Lista de productos</h2>
        <a href="{{route('producto.create')}}" class="btn btn-primary">Nuevo</a>
    </div>
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>NOMBRE</td>
                <td>DESCRIPCION</td>
                <td>PRECIO COMPRA</td>
                <td>PRECIO VENTA</td>
                <td>STOCK</td>
                <td>CATEGORIA</td>
                <td>ACCIONES</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto->nombre_producto}}</td>
                <td>{{$producto->descripcion_producto}}</td>
                <td>{{$producto->pcompra_producto}}</td>
                <td>{{$producto->pventa_producto}}</td>
                <td>{{$producto->stock_producto}}</td>
                <td>{{$producto->categoria->nombre_categoria}}</td>
                <td>
                    <div class="d-flex justify-content-begin">
                    <form action="{{route('producto.edit', $producto->id)}}">
                    <button class="btn btn-success btn-xs mr-1">EDITAR</button>
                    </form>
                    <form action="{{route('producto.destroy', $producto->id)}}" method="POST">
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