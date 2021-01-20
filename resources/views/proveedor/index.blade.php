@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-end">
<a href="{{route('proveedor.create')}}" class="btn btn-primary">NUEVO</a>
</div>
<table class="table">
    <thead>
        <tr>
            <td>id </td>
            <td>NOMBRE</td>
            <td>CORREO</td>
            <td>TELEFONO</td>
            <td>DIRECCION</td>
            <td>PROVEEDOR</td>
            <td>ACCIONES</td>
         </tr>
    </thead>
    <tbody>
        @foreach ($proveedors as $proveedor)
            <tr>
                <td>{{$proveedor->id}}</td>
                <td>{{$proveedor->nombre_proveedor}}</td>
                <td>{{$proveedor->correo_proveedor}}</td>
                <td>{{$proveedor->direccion_proveedor}}</td>
                <td>{{$proveedor->telefono_proveedor}}</td>
                <td>
                    <a href="{{ route('proveedor.show', $proveedor) }}" class="badge badge-primary">
                        Ver compras
                    </a>
                </td>
                <td>
                    <div class="d-flex justify-content-begin">
                        <form action="{{route('proveedor.edit', $proveedor->id)}}">
                            <button class="btn btn-success btn-xs mr-1">EDITAR</button>
                        </form>
                        <form action="{{route('proveedor.destroy', $proveedor->id)}}" method="POST">
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