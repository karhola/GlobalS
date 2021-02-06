<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
      <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="card component-card_1">
            <div class="card-header">
                <h1 >Datos</h1>
            </div>
            <div class="card-body">
                <div class="card-title">
                    Nombre: {{ $msg['nombre'] }} <br>
                    Apellido: {{ $msg['apellido'] }} <br>
                    Email: {{ $msg['email'] }} <br>
                </div>
                <div class="card-text">
                    Asunto: {{ $msg['asunto'] }} <br>
                    Mensaje: {{ $msg['mensaje'] }}
                </div>
            </div>
        </div>
        
        <br>  

    </div>
</body>
</html>


