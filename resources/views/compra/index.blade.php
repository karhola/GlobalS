@extends('admin.layout')
@section('content')
<h1>COMPRAS</h1>
<div class="d-flex justify-content-end">
    <a href="{{route('compra.create')}}" class="btn btn-primary">NUEVO</a>
</div>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>FECHA</td>
            <td>ACCIONES</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($compras as $compra)
        <tr>
           <td>{{$compra->id}}</td>
           <td>{{$compra->fecha_compra}}</td>
           <td>
               <div class="d-flex justify-content-begin">
                    <form action="{{route('compra.edit', $compra->id)}}">
                        <button class="btn btn-success btn-xs mr-1">EDITAR</button>
                    </form>
                    <form action="{{route('compra.destroy', $compra->id)}}" method="POST">
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