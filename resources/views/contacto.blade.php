@extends('store.nav')
@section('content')
    <div class="text-white fondo">
        <section class="container">
            <h3 class="display-5 text-center mt-0 pt-5">GLOBAL SISTEM SANTA CRUZ</h3>
                <br>
                <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                        <div class="text-white well mb-3 pad"> 
                            <div class="card-body">
                                <h4 class="tittles-pages text-center">Formulario de contacto</h4>
                                <br>
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('mensaje') }}">
                                @csrf
                            <div class="row mb-3">
                                <div class="input-field col s6">
                                    <input id="first_name" type="text" class="validate" name="nombre">
                                   <label for="first_name">First Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="last_name" type="text" class="validate" name="apellido">
                                    <label for="last_name">Last Name</label>
                                  </div>
                            </div>
                            <div class="row mb-3">
                                <div class="input-field col s12">
                                    <input id="email" type="email" class="validate" name="email">
                                    <label for="email">Email</label>
                                    </div>
                            </div>
                            <div class="row mb-3">
                                <div class="input-field col s12">
                                    <textarea id="textarea2" class="materialize-textarea" data-length="120" name="asunto"></textarea>
                                    <label for="textarea2">Asunto</label>
                                    </div>
                            </div>
                            <div class="row mb-3">
                                    <div class="row">
                                        <div class="input-field col s6">
                                        <i class="material-icons prefix">M</i>
                                        <textarea id="icon_prefix2" class="materialize-textarea" name="mensaje"></textarea>
                                        <label for="icon_prefix2">Mensaje</label>
                                        </div>
                                    </div>
                            </div>
                            <button type="submit" style="width: 100%" class="btn btn-primary pull-right">Enviar</button>
                        </form>
                            </div>
                            </div>
                </div>
                <div class="col-3"></div>
            </div>
            <h5 class="text-center mb-0 pb-4">2021 Global Sistem | La actitud hace la diferencia</h5>
        </section> 
    </div>
@endsection
@push('styles')
    <style>
        @import url(https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css);
        .fondo {
            background: #780206;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, hsla(233, 88%, 20%, 0.631), hsla(358, 97%, 24%, 0.624)), url(../img/sucre.jpg); 
            background: linear-gradient(to right, hsla(233, 88%, 20%, 0.631), hsla(358, 97%, 24%, 0.624)), url(../img/sucre.jpg); 
            background-repeat: no-repeat;
            background-size: cover;
            widows: 100%;
            position: relative;            
        }
    </style>
@endpush
@push('scripts')
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

@endpush


