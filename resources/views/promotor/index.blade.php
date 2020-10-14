@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-end">
<a href="{{route('promotor.create')}}" class="btn btn-primary">NUEVO</a>
</div>
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