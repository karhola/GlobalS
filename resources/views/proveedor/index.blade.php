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
             <td>ACCIONES</td>
         </tr>
     </thead>
     <tbody>
         @foreach ($datos as $item)
             <tr>
                 <td>{{$item->id}}</td>
                 <td>{{$item->nombre_proveedor}}</td>
                 <td>{{$item->correo_proveedor}}</td>
                 <td>{{$item->direccion_proveedor}}</td>
                 <td>{{$item->telefono_proveedor}}</td>
                 <td>
                     <div class="d-flex justify-content-begin">
                     <form action="{{route('proveedor.edit', $item->id)}}">
                        <button class="btn btn-success btn-xs mr-1">EDITAR</button>
                     </form>
                    <form action="{{route('proveedor.destroy', $item->id)}}" method="POST">
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