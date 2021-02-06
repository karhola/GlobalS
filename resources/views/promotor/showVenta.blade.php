@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h4>Detalles del promotor</h4>
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
                <td>{{ $proveedor->nombre_promotor }} {{ $proveedor->apellido_promotor }}</td>
            </tr>
            <tr>
                <th>Direccion:</th>
                <td>{{ $proveedor->direccion_promotor }}</td>
            </tr>
            <tr>
                <th>Telefono:</th>
                <td>{{ $proveedor->celular_promotor }}</td>
            </tr>
            <tr>
                <th>Cedula:</th>
                <td>{{ $proveedor->ci_promotor }}</td>
            </tr>
        </tbody>
    </table>
</div>
<hr style="background-color: black; height: 3px;">
<h4>Lista de ventas</h4>
<hr style="background-color: black; height: 3px;">
<table class="table">
    <thead>
        <tr>
            <td>Id </td>
            <td>Cantidad</td>
            <td>Fecha</td>
            <td>Beneficios</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($ventas as $venta)
            <tr>
                <td>{{$venta->id}}</td>
                <td>{{$venta->cantidad_v}}</td>
                <td>{{$venta->fecha_venta}}</td>
                <td>{{$venta->beneficio_total_promotor}}</td>
                <td>
                    <a href="{{ route('venta.productos', $promotor->id) }}">Ver mas</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection