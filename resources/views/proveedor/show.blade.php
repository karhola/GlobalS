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
        @foreach ($compras as $compra)
            <tr>
                <td>{{$compra->id}}</td>
                <td>{{$compra->cantidad_compra}}</td>
                <td>{{$compra->fecha_compra}}</td>
                <td>{{$compra->costo_importacion_total}}</td>
                <td>{{$compra->total_compra}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection