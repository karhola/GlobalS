@extends('admin.layout')
@section('content_title')
    <div class="d-flex justify-content-between pt-5 px-5 align-items-center">
        <h2>Lista de categorias</h2>
        <a href="{{route('categoria.create')}}" class="btn btn-primary">NUEVO</a>
    </div>
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <td class="text-center">ID</td>
                <td class="text-center">NOMBRE</td>
                <td class="text-center">ACCIONES</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $item)
                <tr>
                    <td class="text-center">{{$item->id}}</td>
                    <td class="text-center">{{$item->nombre_categoria}}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <form action="{{route('categoria.edit', $item->id)}}">
                                <button class="btn btn-info btn-xs mr-1">EDITAR</button>
                            </form>
                            <form action="{{route('categoria.destroy', $item->id)}}" method="POST">
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