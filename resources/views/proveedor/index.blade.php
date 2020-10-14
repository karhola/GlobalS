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
                 <a href="{{route('proveedor.edit',$item)}}">EDITAR</a>
                 <form action="{{route('proveedor.destroy',$item)}}" method="POST">
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