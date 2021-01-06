@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-end">
<a href="{{route('pedido.create')}}" class="btn btn-primary">NUEVO</a>
</div>
 <table class="table">
     <thead>
         <tr>
             <td>id </td>
             <td>FECHA DE ENTREGA</td>
             <td>FECHA DE DEVOLUCION</td>
             <td>TOTAL RETENIDO</td>
             <td>TOTAL DEVUELTO</td>
             <td>ESTADO</td>
             <td>ACCIONES</td>
         </tr>
     </thead>
     <tbody>
         @foreach ($pedidos as $pedido)
             <tr>
                 <td>{{$pedido->id}}</td>
                 <td>{{$pedido->fecha_entrega}}</td>
                 <td>{{$pedido->fecha_devolucion}}</td>
                 <td>{{$pedido->total_cantidad_retenida}}</td>
                 <td>{{$pedido->total_cantidad_devuelta}}</td>
                 @if ($pedido->estado_p == 0)
                    <td>
                        <div class="badge badge-warning">
                            Pendiente
                        </div>
                    </td>
                 @else
                    <td>
                        <div class="badge badge-success">
                            Entregado
                        </div>
                    </td>
                 @endif
                 <td>
   


                 <a href="{{route('pedido.edit',$pedido)}}">EDITAR</a>
                 <form action="{{route('pedido.destroy',$pedido)}}" method="POST">
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