<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css')}}">
    <title>proyecto</title>
    @stack('styles')

</head>
<body style="background-color: #fff;">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand"  href="{{ route('categoria.index')}}" >Global Sistem</a>
           
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="{{route('store.index')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('store')}}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contacto')}}">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.facebook.com/Global-sistem-bolivia-798802070168331" class="nav-link">Pagina de Facebook</a>
                    </li>
                </ul>
                <a href="{{ route('cart-show') }}" class="cart position-relative d-inline-flex nav-link">
                    <i class="fas fa fa-shopping-cart fa-lg"></i>
                    <span class="cart-basket d-flex align-items-center justify-content-center">
                        0
                    </span>
                </a>
                <li>
                <a href=" {{route('categoria.index')}}" class="btn btn-sm btn-outline-warning">Sign in</a>
                </li>

            </div>
        </div>
    </nav>
    <br><br>
    <div class="">
        @yield('content')
    </div>
    <footer>
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>CELULAR</h4>
                <p>77172091</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>willamojeda95@gmail.com</p>
            </div>
            <div class="content-foo">
                <h4>Ubicacion</h4>
                <p>Cuarto anillo y av. R.Hijo</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; KarHola Desing | Global Sistem</h2>
    </footer>
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    @stack('scripts')
</body>
</html>