@extends('admin.layout')
@section('content')
<div class="col-4">
    <div class="card mt-2 text-center">
        <div class="card-header">
            {{$categoria->nombre_categoria}} 
            
        </div>
        <div class="card-body">
            CI  : {{$categoria->nombre_categoria}} <br>
       
        </div>
        <div class="card-footer form-inline d-flex justify-content-center">
            <form action="{{route('categoria.edit', $categoria->id)}}">
            
            <button class="btn btn-success mr-1">EDITAR</button>
            </form>
        <form action="{{route('categoria.destroy', $categoria->id)}}" method="POST">
           @csrf
           @method('DELETE')
           <button class="btn btn-danger">ELIMINAR</button>
        </form>
        </div>
    </div>
</div>   
@endsection