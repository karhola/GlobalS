@extends('admin.layout')
@section('content_title')
    <div class="d-flex justify-content-between p-3 align-items-center">
        <h1>Listado de promotores</h1>
        <a href="{{route('promotor.create')}}" class="btn btn-primary">NUEVO</a>
    </div>
@endsection
@section('content')
<table class="table">
    <thead>
        <tr>
            <td>id </td>
            <td>NOMBRE</td>
            <td>APELLIDO</td>
            <td>DIRECCION</td>
            <td>CELULAR</td>
            <td>FECHA DE NACIMIENTO</td>
            <td>CI</td>
            <td>PEDIDOS</td>
            <td>ACCIONES</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($promotors as $promotor)
            <tr>
                <td>{{$promotor->id}}</td>
                <td>{{$promotor->nombre_promotor}}</td>
                <td>{{$promotor->apellido_promotor}}</td>
                <td>{{$promotor->direccion_promotor}}</td>
                <td>{{$promotor->celular_promotor}}</td>
                <td>{{$promotor->fecha_nacimiento}}</td>
                <td>{{$promotor->ci_promotor}}</td>
                <td>
                    <a href="{{ route('promotor.show', $promotor) }}">Ver pedidos</a>
                </td>
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