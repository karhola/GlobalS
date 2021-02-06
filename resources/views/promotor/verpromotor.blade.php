@extends('admin.layout')

@section('content')
    <div class="card component-card_9">
        <img src="{{ asset('AdminCork/assets/img/grid-blog-style-3.jpg') }}" class="card-img-top" alt="widget-card-2">
        <div class="card-body">
            <h4 class="card-title">
                {{ $promotor->nombre_promotor }} {{ $promotor->apellido_promotor }}
            </h4>
            <hr>
            <p class="card-text">
                Celular: {{ $promotor->celular_promotor }}
            </p>
            <p class="card-text">
                Documento de identificacion: {{ $promotor->ci_promotor }}
            </p>
            <p class="card-text">
                Fecha de nacimiento: {{ $promotor->fecha_nacimiento }}
            </p>
            <p class="card-text">
                Direccion <br>
                {{ $promotor->direccion_promotor }}
            </p>

            <div class="meta-info">
                <div class="meta-user">
                    <div class="avatar avatar-sm">
                        <span class="avatar-title rounded-circle">
                            {{ $promotor->nombre_promotor[0] }}{{ $promotor->apellido_promotor[0] }}
                        </span>
                    </div>
                    <div class="user-name">{{ $promotor->nombre_promotor }}</div>
                </div>

                <div class="meta-action">
                    <div class="meta-likes">
                        Pedidos: 45
                    </div>

                    <div class="meta-view">
                         Ventas: 250
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('AdminCork/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('AdminCork/plugins/font-icons/fontawesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminCork/plugins/font-icons/fontawesome/css/fontawesome.css') }}">
    <link href="{{ asset('AdminCork/assets/css/components/cards/card.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script src="{{ asset('AdminCork/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('AdminCork/plugins/font-icons/feather/feather.min.js') }}"></script>
    <script>
        feather.replace();
    </script>
@endpush

