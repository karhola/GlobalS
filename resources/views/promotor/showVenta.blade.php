@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h4>Detalles del proveedor</h4>
    <a href="{{ route('proveedor.index') }}">
        Volver
    </a>
</div>
<hr style="background-color: black; height: 3px;">
<div class="table-responsive">
    <table class="table table-borderless">
        <tbody>
            <tr>
                <th>Nombre:</th>
                <td>{{ $proveedor->nombre_proveedor }}</td>
            </tr>
            <tr>
                <th>E-mail:</th>
                <td>{{ $proveedor->correo_proveedor }}</td>
            </tr>
            <tr>
                <th>Direccion:</th>
                <td>{{ $proveedor->direccion_proveedor }}</td>
            </tr>
            <tr>
                <th>Telefono:</th>
                <td>{{ $proveedor->telefono_proveedor }}</td>
            </tr>
            <tr>
                <th>Cedula:</th>
                <td>{{ $proveedor->ci_proveedor }}</td>
            </tr>
        </tbody>
    </table>
</div>
<hr style="background-color: black; height: 3px;">
<h4>Detalles de las compras</h4>
<hr style="background-color: black; height: 3px;">
<table class="table">
    <thead>
        <tr>
            <td>Id </td>
            <td>Cantidad</td>
            <td>Fecha</td>
            <td>Costo Importacion</td>
            <td>Total</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($ventas as $venta)
            <tr>
                <td>{{$venta->id}}</td>
                <td>{{$venta->cantidad_venta}}</td>
                <td>{{$venta->fecha_venta}}</td>
                <td>{{$venta->costo_importacion_total}}</td>
                <td>{{$venta->total_venta}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection