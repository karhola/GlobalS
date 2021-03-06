@extends('admin.layout')
@section('content_title')
    <div class="d-flex justify-content-between pt-5 px-5 align-items-center">
        <div>
            <img src="{{ asset('img/global.jpg') }}" alt="Global System" class="imageventa" width="100px">
            <h2>Detalle del pedido</h2>
        </div>
        <div>
            <h3 class="text-secondry">Global System</h3>
            <p>Direccion: avenida siempre viva</p>
            <p>Telefono: 78619181</p>
        </div>
    </div>
@endsection
@section('content')
<hr style="background-color: black; height: 3px;">
<br>
<form action="{{ route('pedido.store') }}" method="POST" id="formPedido">
    @csrf
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="">SELECCIONE AL PROMOTOR</label>
                <select name="promotor_id"  class="custom-select">
                    <option selected disabled>Elija un promotor..</option>
                    @foreach ($promotors as $promotor)
                        <option value="{{$promotor->id}}">
                            {{$promotor->nombre_promotor}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Fecha de entrega</label>
                <input type="date" value="{{ date('Y-m-d') }}" name="fecha_entrega" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="selectPedidoProducto">Elija un producto</label>
                <select onchange="obtenerProducto(this)" id="selectPedidoProducto" class="custom-select">
                    <option selected disabled>Elija un producto..</option>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">
                            {{ $producto->nombre_producto }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col form-group">
            <label for="">Cantidad</label>
            <input type="number" min="0" value="1" class="form-control" id="cantidadId">
        </div>
        <div class="col form-group">
            <label for="">Precio</label>
            <input type="number" min="0" value="0" class="form-control" id="precioId" disabled>
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-end">
        <button class="btn btn-info" type="button" onclick="llamarProducto()">Añadir producto</button>
    </div>
    <div class="row p-3">
        <div class="col border shadow p-3 rounded">
            <table class="table" id="pedidos">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody id="DataResultProducto">
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary mr-3" type="submit" onclick="datos()">
            <i data-feather="check"></i>
            Registrar Pedido
        </button>
        <button class="btn btn-danger" onclick="redireccionar()" type="button">
            <i data-feather="x"></i>
            Cancelar
        </button>
    </div>
</form>
@endsection

@push('scripts')
<script>
    async function obtenerProducto(id){
        var url = "{{ route('api.show.producto', ['id' => 'temp']) }}";
        url = url.replace('temp', id.value);
        const result = await $.ajax({
            url: url,
            type: "GET",
            success: function(data){
                document.getElementById('cantidadId').value = data.stock_producto;
                document.getElementById('precioId').value = data.pventa_producto;
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log('error');
            }
        });
    }


    // creamos la variable para almacenar el total productos ,beneficio promotor oficina
    var cantidadTotal = 0;
    var totalProductos = 0;
    async function llamarProducto(){
        // obtenemos el valor del select
        var select = document.getElementById("selectPedidoProducto").value;
        // usamos la ruta de laravel y la guardamos en la url
        var url = "{{ route('api.show.producto', ['id' => 'temp']) }}";
        // reemplazamo temp con id del producto del select
        url = url.replace('temp', select);
        // obtenemos todo el tbody de la tabla
        var contenedor  = $("#DataResultProducto").html();
        // obtenemos el valor del input cantidad
        var cantidadId = document.getElementById('cantidadId').value;
        // usamos ajax para consumir la api desde laravel
        const resultado = await $.ajax({
            url: url,
            type: "GET",
            success: function(data){
                console.log(data);
                var html = '';
                html += '<tr>' +
                    '<td class="id">' + data.id + '</td>' +
                    '<td>' + data.nombre_producto + '</td>' +
                    '<td class="cantidad">' + cantidadId + '</td>' +
                    '<td class="venta">' + data.pventa_producto + '</td>' +
                    '</tr>';
                cantidadTotal += parseInt(cantidadId);
                console.log("Total de productos" + cantidadTotal);
                $('#DataResultProducto').html(contenedor+html);
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log('error');
            }
        });



    }

    function redireccionar(){
        window.location = "{{ route('pedido.index') }}";
    }

    function datos(){
        let materiales = [];
        let filaId = [];
        document.querySelectorAll('#pedidos tbody tr').forEach(function(e){
            filaId.push(e.querySelector('.id').innerText);
            let fila = {
                id: e.querySelector('.id').innerText,
                cantidad: e.querySelector('.cantidad').innerText,
                venta: e.querySelector('.venta').innerText
            };
            materiales.push(fila);
        });


        //aquí instanciamos al componente padre
        var padre = document.getElementById("formPedido");
        //aquí agregamos el componente de tipo input
        var producto = document.createElement("input");
        //aquí indicamos que es un input de tipo text
        producto.type = 'hidden';
        var productos = @php echo json_encode('temp', JSON_HEX_APOS) @endphp ;
        productos = productos.replace('temp' , materiales);
        producto.value = filaId;
        producto.name = 'productos[]';
        //y por ultimo agreamos el componente creado al padre
        padre.appendChild(producto);

    }

</script>
@endpush
