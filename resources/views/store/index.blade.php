<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css')}}">
    <title>proyecto</title>

</head>
<body style="background-color: #fff;">
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand"  href="{{ route('detalleCompra.index')}}" >Global Sistem</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="{{ route('store.index') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('store')}}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.facebook.com/Defensoria-de-la-Ni%C3%B1ez-y-Adolescencia-de-Yacuiba-1546144615684389/photos/?ref=page_internal" class="nav-link">Pagina de Facebook</a>
                    </li>
                </ul>
                <a href="{{ route('cart-show') }}" class="cart position-relative d-inline-flex nav-link">
                    <i class="fas fa fa-shopping-cart fa-lg"></i>
                    <span class="cart-basket d-flex align-items-center justify-content-center">
                        0
                    </span>
                </a>
            </div>
        </div>
    </nav>
    <header>
        <section class="textos-header">
            <h1>OFERTA DE PRODUCTOS</h1>
            <h2>GLOBAL SISTEM te ofrece productos de bazar, ferreteria, jugueteria y mucho mas...!!!</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C245.90,163.31 351.77,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
    </header>

    <main>
        <div class="container">
        <div class="py-20 text-center">
            <img class="d-block mx-auto mb-4" src="/img/gloo.gif" alt="" width="72" height="57">
            <h2>Global Sistem</h2>
            <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>
    </main>
    <div class="container">
        @yield('content')
    </div>
    <main>

        </div>

        <section class="contenedor sobre-nosotros">
            <h2 class="titulo">OFERTAS DE PRODUCTOS</h2>
            <div class="contenedor-sobre-nosotros row">
                <img src="/img/entrega.jpg" alt="" class="imagen-about-us">
                <div class="contenido-textos">
                    <h3><span>1</span>Los mejores productos</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam voluptatem quaerat nemo quae ipsa recusandae nam illum, cum maiores veniam, dolore id dolores. Suscipit ea, dolore voluptates nihil iure optio!</p>
                    <h3><span>2</span>Los mejores productos</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam voluptatem quaerat nemo quae ipsa recusandae nam illum, cum maiores veniam, dolore id dolores. Suscipit ea, dolore voluptates nihil iure optio!</p>
                </div>
            </div>
        </section>
      {{--  @empty(! $productos)
            <section class="portafolio">
                <div class="contenedor">
                    <h2 class="titulo">Lista de productos</h2>
                    <div class="galeria-port">
                        @foreach ($productos as $producto)
                            <div class="imagen-port">
                                <img src="{{ asset('imagenes/'.$producto->pfoto) }}" alt="{{ $producto->nombre_producto }}">
                                <div class="hover-galeria">
                                    <img src="/img/gloo.gif" alt="{{ $producto->nombre_producto }}">
                                    <p>{{ $producto->nombre_producto }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endempty--}}
        <section class="container">
            <br>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                <div class="col">
                <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 fw-normal">Free</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>10 users included</li>
                    <li>2 GB of storage</li>
                    <li>Email support</li>
                    <li>Help center access</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
                </div>
                </div>
                </div>
                <div class="col">
                <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 fw-normal">Pro</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>20 users included</li>
                    <li>10 GB of storage</li>
                    <li>Priority email support</li>
                    <li>Help center access</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
                </div>
                </div>
                </div>
                <div class="col">
                <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 fw-normal">Enterprise</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>30 users included</li>
                    <li>15 GB of storage</li>
                    <li>Phone and email support</li>
                    <li>Help center access</li>
                    </ul>
                    <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button>
                </div>
                </div>
                </div>
            </div>
        </section>

    <!--   <section class="clientes contenedor">
            <h2 class="titulo">Que dicen nuestros clientes</h2>
            <div class="cards">
                <div class="card">
                    <img src="img/pro1.jpg" alt="">
                    <div class="contenedor-texto-card">
                        <h4>NOMBRE</h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores, ex.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/pro1.jpg" alt="">
                    <div class="contenedor-texto-card">
                        <h4>NOMBRE</h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores, ex.</p>
                    </div>
                </div>
            </div>
        </section>
    -->

        <section class="about-services">
            <div class="contenedor">
                <h2 class="titulo">Nuestros Servicios</h2>
                <div class="servicio-cont">
                    <div class="servicio-ind">
                        <img class="rounded-circle" src="/img/glo1.jpg" alt="">
                        <h3>Name</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, explicabo.</p>
                    </div>
                    <div class="servicio-ind">
                        <img class="rounded-circle" src="/img/glo1.jpg" alt="">
                        <h3>Name</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, explicabo.</p>
                    </div>
                    <div class="servicio-ind">
                        <img class="rounded-circle" src="/img/glo1.jpg" alt="">
                        <h3>Name</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, explicabo.</p>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <footer>
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Phone</h4>
                <p>4565465</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>4565465</p>
            </div>
            <div class="content-foo">
                <h4>Location</h4>
                <p>4565465</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; KarHola Desing | Global Sistem</h2>
    </footer>
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
</body>
</html>