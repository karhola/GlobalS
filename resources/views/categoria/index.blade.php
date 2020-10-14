@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-end">
    <a href="{{route('categoria.create')}}" class="btn btn-primary">NUEVO</a>
</div>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>NOMBRE</td>
            <td>ACCIONES</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $item)
        <tr>
           <td>{{$item->id}}</td>
           <td>{{$item->nombre_categoria}}</td>
           <td>
               <div class="d-flex justify-content-begin">
                    <form action="{{route('categoria.edit', $item->id)}}">
                        <button class="btn btn-success btn-xs mr-1">EDITAR</button>
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