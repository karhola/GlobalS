@extends('store.nav')
@section('content')
    <div class="container text-center login-container border shadow  rounded p-4">
        <div class="detalle-title">
            <h1><i class="fa fa shopping-cart"></i>Carrito de Compras</h1>
        </div>
        <div class="table-cart">
            @if( !\Cart::isEmpty() )
                <p>
                    <a href="{{ route('cart-trash')}}" class="btn btn-danger">Vaciar carrito <i class="fa fa-trash"></i></a>
                </p>
                
                <ul class="list-group list-group-flush">
                    @foreach ($cart as $item)
                        <li class="list-group-item">
                            <div class="row mt-4">
                                <div class="col-md-3">
                                    <img src="{{ asset('imagenes/'.$item->attributes->pfoto) }}" alt="{{ $item->attributes->nombre_producto }}" height="180px">
                                </div>
                                <div class="col-md-9">
                                    <div class="row justify-content-between">
                                        <div class="col">
                                            <h5 class="text-start">
                                                {{ $item->name }}
                                            </h5>
                                        </div>
                                        <div class="col text-end">
                                            <h4>{{ $item->price }}</h4>
                                        </div>
                                    </div>
                                    <p class="card-text text-start">
                                        <div class="row">
                                            <div class="col-8 text-start">
                                                {!! $item->attributes->descripcion_producto !!}
                                            </div>
                                        </div>
                                    </p>
                                    <p class="card-text text-start">
                                        <small class="text-muted">Stock: {{ $item->attributes->stock_producto }}</small>
                                    </p>
                                    <p class="card-text text-start">
                                        Cantidad: {{ $item->quantity }}
                                        &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('cart-update', $item->id) }}" class="text-success text-decoration-none">
                                            aumentar
                                        </a>
                                        &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;
                                        <a href="{{ route('cart-delete', $item->id) }}" class="text-danger text-decoration-none">
                                            eliminar
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="row">
                    <div class="col text-end">
                        <hr>
                        <h4 class="fw-normal">
                            Total ({{ $totalQuantity }} productos ) : <span class="fw-bold">{{ $total }}</span>
                        </h4>
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            @else
                <p>No hay productos</p>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AYjmQpRe8-TgTOAh73wfwwzOpJ4Gi_GATfzcchKKfdTxK80JPseadb6iwvFZ0ShD5muLWvlB-bq7U_ar"></script>
<script>
    paypal.Buttons( {
      createOrder: function(data, actions)  {
        // Set up the transaction
        return actions.order.create( {
          purchase_units: [ {
            amount:  {
              value: '10'
             }
           }]
         });
       }
     }).render('#paypal-button-container');
  </script>
@endpush

