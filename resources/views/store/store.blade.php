@extends('store.nav')
@section('content')
<style>
    .w-5{
        display: none;
    }

</style>
    <div class="container mt-1 md-3">
        <br><br>
        <br><br>
        
        <div class="row">
            <div class="col-2">
                <div class="card bg-dark text-white" style="width: 12rem;">
                    <div class="card-body">
                <h2 class="card-title">CATEGORIAS</h2><br>
                @foreach ($categoria as $categoria)
                    <a href="{{route('store-filtrado', $categoria->id)}}">
                    <h4>{{$categoria->nombre_categoria}}</h4></a>
                @endforeach
                <a href="{{ route('store')}}"><h4>Todos</h4></a>
                     </div>
                </div>
            
            </div>
            <div class="col-10">
                <div class="d-flex flex-wrap justify-content-around">
                    @foreach ($productos as $producto)
                        <div class="p-2 m-1 border bg-light text-center">
                            <h3>{{$producto->nombre_producto}}</h3><br>
                            <img src="{{asset('imagenes/'.$producto->pfoto)}}" alt="{{$producto->pfoto}}" height="250px" width="250px"><br>
                            <div>
                                <h3><span class="badge badge-success">
                                Precio: {{number_format($producto->pventa_producto,2)}}</span></h3>
                                <p>
                                    <a class="btn btn-warning" href="{{ route('cart-add', $producto) }}">
                                        <i class="fa fa-cart-plus"></i>
                                        Agregar al carrito
                                    </a>
                                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $producto->id }}">
                                      Leer mas
                                    </a>
                                </p>

                            </div>
                                 <!-- Modal -->
                                 <div class="modal fade" id="exampleModal{{ $producto->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Descripcion del Producto</h5>
                                                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                         <div class="modal-body">
                                            <h3>{{$producto->descripcion_producto}}</h3><br>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
     
        <div class="row">
            <div class="col-8">
                {{ $productos->links() }}
            </div>
        </div>
        <br>
    </div>
@endsection