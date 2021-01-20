@extends('store.index')
@section('content')
    <div class="container mt-1 md-3">
        <br><br>
        <div class="row">
            <div class="col-2">
                <h2>CATEGORIAS</h2><br>
                @foreach ($categoria as $categoria)
                    <a href="{{route('store-filtrado', $categoria->id)}}">
                    <h4>{{$categoria->nombre_categoria}}</h4></a>
                @endforeach
                <a href="{{ route('store')}}"><h4>Todos</h4></a>
            </div>
            <div class="col-10">
                <div class="d-flex flex-wrap justify-content-around">
                    @foreach ($productos as $producto)
                        <div class="p-2 m-1 border bg-light text-center">
                            <h3>{{$producto->nombre_producto}}</h3><br>
                            <img src="{{asset('imagenes/'.$producto->pfoto)}}" alt="{{$producto->pfoto}}" height="100px" width="100px"><br>
                            <div>
                                <h3><span class="badge badge-success">
                                Precio: {{number_format($producto->pventa_producto,2)}}</span></h3>
                                <p>
                                    <a class="btn btn-warning" href="{{ route('cart-add', $producto) }}">
                                        <i class="fa fa-cart-plus"></i>
                                        Agregar al carrito
                                    </a>
                                    <a class="btn btn-primary" href="{{route('producto-detail', $producto)}}">
                                        <i class="fa fa-chevron-circle-right"></i>
                                        Leer mas
                                    </a>
                                </p>
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
    </div>
@endsection