@extends('admin.layout')
@section('content_title')
    <div class="d-flex justify-content-between pt-5 px-5 align-items-center">
        <div>
            <img src="{{ asset('img/global.jpg') }}" alt="Global System" class="imageventa" width="100px">
            <h2>Detalle de compra</h2>
        </div>
        <div>
            <h3 class="text-secondry">Global System</h3>
            <p>Direccion: avenida siempre viva</p>
            <p>Telefono: 78619181</p>
        </div>
    </div>
@endsection
@section('content')
    <form action="{{ route('compra.store') }}" method="POST" id="form_compra">
        @csrf
        <hr style="background-color: black; height: 3px;">
        <br>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="form-group">
                    <label for="">Fecha de compra</label>
                    <input type="date" value="{{ date('Y-m-d') }}" name="fecha_compra" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">SELECCIONE AL PROVEEDOR</label>
                    <select name="proveedor_id"  class="custom-select">
                        @foreach ($proveedors as $proveedor)
                            <option value="{{$proveedor->id}}">
                                {{$proveedor->nombre_proveedor}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Elija un producto</label>
                    <select onchange="obtenerProducto(this)" id="selectProducto" class="custom-select">
                        <option selected disabled>Seleccione...</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">
                                {{ $producto->nombre_producto }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col form-group">
                <label for="">Precio</label>
                <input type="number" min="0" value="0" class="form-control" id="precioId" disabled>
            </div>
            <div class="col form-group">
                <label for="">Cantidad</label>
                <input type="number" min="0" value="0" class="form-control" id="cantidadId" />
            </div>
            <div class="col form-group">
                <label for="">Importe</label>
                <input type="number" min="0" value="0" class="form-control" id="importeId" />
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-end">
            <button class="btn btn-info" onclick="llamarProducto()" type="button">
                <i data-feather="plus"></i>
                Añadir producto
            </button>
        </div>
        <div class="row p-3">
            <div class="col border shadow p-3 rounded table table-responsive">
                <table class="table" id="productos">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Importe</th>
                    </tr>
                    </thead>
                    <tbody id="DataResult">
                    </tbody>
                    <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total a pagar:</th>
                        <th>0</th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary mr-3" type="submit" onclick="datos()">
                <i data-feather="check"></i>
                Registrar Compra
            </button>
            <button class="btn btn-danger" onclick="redireccionar()" type="button">
                <i data-feather="x"></i>
                Cancelar
            </button>
        </div>
    </form>
@endsection

@push('styles')
    <link href="{{ asset('AdminCork/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('AdminCork/plugins/font-icons/fontawesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminCork/plugins/font-icons/fontawesome/css/fontawesome.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('AdminCork/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('AdminCork/plugins/font-icons/feather/feather.min.js') }}"></script>
    <script>

        feather.replace();
        async function obtenerProducto(id){
            var url = "{{ route('api.show.producto', ['id' => 'temp']) }}";
            url = url.replace('temp', id.value);
            const result = await $.ajax({
                url: url,
                type: "GET",
                success: function(data){
                    document.getElementById('cantidadId').value = data.stock_producto;
                    document.getElementById('precioId').value = data.pcompra_producto;
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log('error');
                }
            });
        }


        // creamos la variable para almacenar el total productos ,beneficio promotor oficina
        var cantidadTotal = 0;
        var beneficioTotalPromotor = 0;
        var beneficioTotalOficina = 0;
        var totalProductos = 0;
        var totalImportacion = 0;

        async function llamarProducto(){
            // obtenemos el valor del select
            var select = document.getElementById("selectProducto").value;
            // usamos la ruta de laravel y la guardamos en la url
            var url = "{{ route('api.show.producto', ['id' => 'temp']) }}";
            // reemplazamo temp con id del producto del select
            url = url.replace('temp', select);
            // obtenemos todo el tbody de la tabla
            var contenedor  = $("#DataResult").html();
            // obtenemos el valor del input cantidad
            var cantidadId = document.getElementById('cantidadId').value;
            // usamos ajax para consumir la api desde laravel
            const resultado = await $.ajax({
                url: url,
                type: "GET",
                success: function(data){
                    var html = '';
                    html += '<tr>' +
                        '<td class="id">' + data.id + '</td>' +
                        '<td>' + data.nombre_producto + '</td>' +
                        '<td class="cantidad" id="cant'+data.id+'">' + cantidadId + '</td>' +
                        '<td class="venta" id="venta'+data.id+'">' + data.pcompra_producto + '</td>' +
                        '<td>' + cantidadId + '</td>' +
                        '<td class="importe">' + document.getElementById('importeId').value + '</td>' +
                        '</tr>';
                    beneficioTotalOficina += data.beneficio_promotor * parseInt(cantidadId);
                    beneficioTotalPromotor += data.beneficio_oficina * parseInt(cantidadId);
                    cantidadTotal += parseInt(cantidadId);
                    totalImportacion += parseInt( document.getElementById('importeId').value);
                    $('#DataResult').html(contenedor+html);
                    //console.log( parseInt(document.getElementById('cant'+data.id).innerHTML) );
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log('error');
                }
            });


            /* sumar las filas */
            // obtenemos todas las filas del tbody
            const filas = document.querySelectorAll("#productos tbody tr");
            // bucle por cada una de las filas
            filas.forEach((fila) => {
                // obtenemos los tds de cada fila
                const tds=fila.querySelectorAll("td");
                let total=1;
                // bucle por cada uno de los tds con excepcion el primero (id) y ultimo (total)
                for(let i= 2; i<tds.length-2; i++) {
                    // sumamos los tds
                    total *= parseFloat(tds[i].innerHTML);
                }
                // mostramos el total en la ultima casilla
                tds[tds.length-2].innerHTML=total.toFixed(2);
            });

            /* sumar las columnas */
            // obtenemos el numero de columnas
            const columnas = document.querySelectorAll("#productos thead tr th");
            // obtenemos las fila de los totales
            const totalFila = document.querySelectorAll("#productos tfoot tr th");
            // bucle solo de la ultima columna
            for(let i = 4; i < columnas.length; i++) {
                let total=0;
                let totalCantidad = 0;
                // obtenemos el valor de cada una de las filas
                filas.forEach((fila) => {
                    total += parseFloat(fila.querySelectorAll("td")[i].innerHTML);
                    totalCantidad += parseFloat(fila.querySelectorAll("td")[i-1].innerHTML);
                });
                // mostramos el total en la ultima fila
                totalFila[i].innerHTML = total.toFixed(2);
                totalProductos = totalCantidad;
            }
            // variable total de productos

        }

        function redireccionar(){
            window.location = "{{ route('venta.index') }}";
        }

        function datos(){
            let materiales = [];
            let filaId = [];
            // array de cantidades por productos
            var cantidadProducto = [];
            // array de subtotales por productos
            var subtotalProducto = [];
            var importacion = [];
            document.querySelectorAll('#productos tbody tr').forEach(function(e){
                filaId.push(e.querySelector('.id').innerText);
                cantidadProducto.push(e.querySelector('.cantidad').innerText);
                subtotalProducto.push(e.querySelector('.venta').innerText);
                importacion.push(e.querySelector('.importe').innerText);
            });


            //aquí instanciamos al componente padre
            var padre = document.getElementById("form_compra");
            //aquí agregamos el componente de tipo input
            var producto = document.createElement("input");
            //aquí indicamos que es un input de tipo text
            producto.type = 'hidden';
            producto.value = filaId;
            producto.name = 'productos[]';
            //y por ultimo agreamos el componente creado al padre
            padre.appendChild(producto);

            //aquí agregamos el componente de tipo input
            var productoCantidad = document.createElement("input");
            //aquí indicamos que es un input de tipo text
            productoCantidad.type = 'hidden';
            productoCantidad.value = cantidadProducto;
            productoCantidad.name = 'cantidadProducto[]';
            //y por ultimo agreamos el componente creado al padre
            padre.appendChild(productoCantidad);

            //aquí agregamos el componente de tipo input
            var productoSubtotal = document.createElement("input");
            //aquí indicamos que es un input de tipo text
            productoSubtotal.type = 'hidden';
            productoSubtotal.value = subtotalProducto;
            productoSubtotal.name = 'subtotalProducto[]';
            //y por ultimo agreamos el componente creado al padre
            padre.appendChild(productoSubtotal);

            //aquí agregamos el componente de tipo input
            var importacionProducto = document.createElement("input");
            //aquí indicamos que es un input de tipo text
            importacionProducto.type = 'hidden';
            importacionProducto.value = importacion;
            importacionProducto.name = 'importacionProducto[]';
            //y por ultimo agreamos el componente creado al padre
            padre.appendChild(importacionProducto);

            //aquí agregamos el componente de tipo input
            var totalVenta = document.createElement("input");
            //aquí indicamos que es un input de tipo text
            totalVenta.type = 'hidden';
            totalVenta.value = totalProductos;
            totalVenta.name = 'total_compra';
            //y por ultimo agreamos el componente creado al padre
            padre.appendChild(totalVenta);

            //aquí agregamos el componente de tipo input
            var cantidadVenta = document.createElement("input");
            //aquí indicamos que es un input de tipo text
            cantidadVenta.type = 'hidden';
            cantidadVenta.value = cantidadTotal;
            cantidadVenta.name = 'cantidad_compra';
            //y por ultimo agreamos el componente creado al padre
            padre.appendChild(cantidadVenta);

            //aquí agregamos el componente de tipo input
            var importacionTotal = document.createElement("input");
            //aquí indicamos que es un input de tipo text
            importacionTotal.type = 'hidden';
            importacionTotal.value = totalImportacion;
            importacionTotal.name = 'costo_importacion_total';
            //y por ultimo agreamos el componente creado al padre
            padre.appendChild(importacionTotal);

        }

    </script>
@endpush
