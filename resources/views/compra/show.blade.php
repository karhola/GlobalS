@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-between align-items-center p-3 m-2">
    <h1>Detalle de compra</h1>
    <a href="{{ route('compra.index') }}">Volver</a>
</div>

<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>NOMBRE PRODUCTO</td>
            <td>DESCRIPCION PRODUCTO</td>
            <td>COMPRA</td>
            <td>IMAGEN</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
                <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre_producto }}</td>
                <td>{{ $producto->descripcion_producto }}</td>
                <td>{{ $producto->pcompra_producto }}</td>
                <td>
                    <img src="{{ asset('imagenes/'.$producto->pfoto) }}" alt="{{ $producto->nombre_producto }}" width="50px">
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection