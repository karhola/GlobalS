<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css')}}">
    <title>proyecto</title>
    <style>
        body {
            background-image: url('{{ asset('img/glo.jpg')}}');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            position: relative;
            
        }
    </style>
</head>
<body > 
        <nav class="navbar navbar-light bg-light">
            <div class="container">
              <a class="navbar-brand" href="{{ route('store.index')}}">Inicio</a>
            </div>
          </nav>
<br>
        <div class="">
            <section class="">
                <div class="container">
                    <div class="row ">
                        <div class="col-xs-6 col-xs-offset-1 col-sm-6 col-sm-offset-0 ">

                         <div class="well">
                                <h3 class="text-center" style="font-family: 'Lobster', cursive; font-size: 27px;">Dirección</h3>
                                <address>
                                  <strong>Pais:</strong> Tu país<br>
                                  <strong>Dirección:</strong> Tu dirección<br>
                                  <strong>Ciudad:</strong> Tu ciudad<br>
                                  <strong>Email:</strong> tucorreo@info.com
                                </address>
                            </div>
                        </div>

                    {{--    <div class="card text-white bg-primary mb-3" >
                            
                            <div class="card-body">
                              <h5 class="card-title">Primary card title</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                          </div>--}}

                        <div class="col-xs-6 col-sm-6 ">
                            <div class="card text-white bg-primary mb-3" >
                                
                                <div class="card-body">
                                  <h5 class="card-title">Primary card title</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <h2 class="tittles-pages text-center">Formulario de contacto</h2>
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Tu nombre</label>
                                    <div class="col-sm-10">	
                                        <input type="text" class="form-control input-form-contact" placeholder="Escribe tu nombre">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Tu Email</label>
                                    <div class="col-sm-10">	
                                        <input type="email" class="form-control input-form-contact" placeholder="Escribe tu Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Asunto</label>
                                    <div class="col-sm-10">	
                                        <input type="text" class="form-control input-form-contact" placeholder="Asunto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Tu mensaje</label>
                                    <div class="col-sm-10">	
                                        <textarea class="form-control input-form-contact" rows="3" placeholder="Escribe tu mensaje"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                            </form>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-4 col-md-push-8">
                            <h2 class="tittles-pages text-center">Info pedidos</h2>
                            <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi quidem ipsum atque numquam, sint odio nesciunt laborum repellat tenetur commodi beatae a, officia praesentium eius fuga illum totam veniam velit.
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae, nam ipsum dolores ut nesciunt sequi iste vitae iusto, unde placeat veniam quis earum atque omnis optio praesentium! Officia, ipsum, neque.
                            </p>
                        </div>
                        <div class="col-xs-12 col-md-8 col-md-pull-4">
                            <h2 class="tittles-pages text-center">Formulario de contacto</h2>
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Tu nombre</label>
                                    <div class="col-sm-10">	
                                        <input type="text" class="form-control input-form-contact" placeholder="Escribe tu nombre">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Tu Email</label>
                                    <div class="col-sm-10">	
                                        <input type="email" class="form-control input-form-contact" placeholder="Escribe tu Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Asunto</label>
                                    <div class="col-sm-10">	
                                        <input type="text" class="form-control input-form-contact" placeholder="Asunto">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2">Tu mensaje</label>
                                    <div class="col-sm-10">	
                                        <textarea class="form-control input-form-contact" rows="3" placeholder="Escribe tu mensaje"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section> 
        </div>
    	<footer class="footer">
            <div class="container-fluid">
                <div class="col-xs-12 text-center">
                    <h3>Siguenos en</h3>
                    <ul class="list-unstyled list-social-icons">
                        <li >
                            <a href="#!">
                               <i class="fa fa-facebook" style="background-color: #3B5998;"></i> 
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <i class="fa fa-google-plus" style="background-color: #DD4B39;"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <i class="fa fa-twitter"  style="background-color: #56A3D9;"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <i class="fa fa-youtube" style="background-color: #BF221F;"></i>
                            </a>
                        </li>
                    </ul>
                    <h4>Store &copy; 2021</h4>
                </div>
            </div>
        </footer>  
    </div>
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
</body>
</html>