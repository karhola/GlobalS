@extends('admin.layout')

@section('content_title')
    <div class="d-flex justify-content-between mr-4 ml-4 mt-4 align-items-center">
        <h1>Lista de Ventas</h1>
        <a href="{{route('venta.create')}}" class="btn btn-primary">NUEVO</a>
    </div>
@endsection

@section('content')
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>FECHA DE VENTA</td>
            <td>CANTIDAD</td>
            <td>PRECIO UNITARIO</td>
            <td>TOTAL</td>
            <td>PROMOTOR</td>
            <td>ACCIONES</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($ventas as $venta)
        <tr>
           <td>{{$venta->id}}</td>
           <td>{{$venta->fecha_venta}}</td>
           <td>{{$venta->cantidad}}</td>
           <td>{{$venta->precio_unitario}}</td>
           <td>{{$venta->total_venta}}</td>
           <td>{{$venta->promotor->nombre_promotor}}</td>

           <td>
               <div class="d-flex justify-content-begin">
                    <form action="{{route('venta.edit', $venta->id)}}">
                        <button class="btn btn-success btn-xs mr-1">EDITAR</button>
                    </form>
                    <form action="{{route('venta.destroy', $venta->id)}}" method="POST">
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