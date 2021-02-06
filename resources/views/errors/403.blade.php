<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo4/pages_error500.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jun 2020 19:03:44 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Error 500 | CORK - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('AdminCork/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('AdminCork/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('AdminCork/assets/css/pages/error/style-500.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
</head>
<body class="error500 text-center">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mr-auto mt-5 text-md-left text-center">
                <a href="index-2.html" class="ml-md-5">
                    <img alt="image-500" src="{{ asset('AdminCork/assets/img/logo2.svg') }}" class="theme-logo">
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid error-content">
        <div class="">
            <h1 class="error-number">403</h1>
            <p class="mini-text">Ooops!</p>
            <p class="error-text">No tiene autorizacion</p>
            <a href="{{ url()->previous() }}" class="btn btn-secondary mt-5">Regresar</a>
        </div>
    </div>

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('AdminCork/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('AdminCork/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('AdminCork/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo4/pages_error500.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jun 2020 19:03:44 GMT -->
</html>