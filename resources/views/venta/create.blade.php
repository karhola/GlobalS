@extends('admin.layout')
@section('content_title')
    <div class="d-flex justify-content-between pt-5 px-5 align-items-center">
        <div>
            <img src="{{ asset('img/global.jpg') }}" alt="Global System" class="imageventa" width="100px">
            <h2>Detalle de venta</h2>
        </div>
        <div>
            <h3 class="text-secondry">Global System</h3>
            <p>Direccion: avenida siempre viva</p>
            <p>Telefono: 78619181</p>
        </div>
    </div>
@endsection
@section('content')
<form action="{{ route('venta.store') }}" method="POST" id="form_venta">
    @csrf
    <hr style="background-color: black; height: 3px;">
    <br>
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <div class="form-group">
                <label for="">Fecha de venta</label>
                <input type="date" value="{{ date('Y-m-d') }}" name="fecha_venta" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="">SELECCIONE AL PROMOTOR</label>
                <select name="promotor_id"  class="custom-select">
                    @foreach ($promotors as $promotor)
                        <option value="{{$promotor->id}}">
                            {{$promotor->nombre_promotor}}
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
            <input type="number" min="0" value="0" class="form-control" id="cantidadId" />
        </div>
        <div class="col form-group">
            <label for="">Precio</label>
            <input type="number" min="0" value="0" class="form-control" id="precioId" disabled>
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
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary mr-3" type="submit" onclick="datos()">
            <i data-feather="check"></i>
            Registrar Venta
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
                    document.getElementById('cantidadId').max = data.stock_producto;
                    document.getElementById('precioId').value = data.pventa_producto;
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
                    console.log(data);
                    var html = '';
                    html += '<tr>' +
                        '<td class="id">' + data.id + '</td>' +
                        '<td>' + data.nombre_producto + '</td>' +
                        '<td class="cantidad">' + cantidadId + '</td>' +
                        '<td class="venta">' + data.pventa_producto + '</td>' +
                        '<td>' + cantidadId + '</td>' +
                    '</tr>';
                    console.log("Beneficio promotor : "+data.beneficio_promotor);
                    console.log("Beneficio oficina : "+data.beneficio_oficina);
                    beneficioTotalOficina += data.beneficio_promotor * parseInt(cantidadId);
                    beneficioTotalPromotor += data.beneficio_oficina * parseInt(cantidadId);
                    console.log("Cantidad del beneficio oficina : " + beneficioTotalOficina);
                    console.log("Cantidad del beneficio promotor : " + beneficioTotalPromotor);
                    cantidadTotal += parseInt(cantidadId);
                    console.log("Total de productos" + cantidadTotal);
                    $('#DataResult').html(contenedor+html);
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
                for(let i=2 ; i<tds.length-1; i++) {
                    // sumamos los tds
                    total *= parseFloat(tds[i].innerHTML);
                    console.log("Soy el total wey "+ total);
                }
                // mostramos el total en la ultima casilla
                tds[tds.length-1].innerHTML=total.toFixed(2);
            });

            /* sumar las columnas */
            // obtenemos el numero de columnas
            const columnas = document.querySelectorAll("#productos thead tr th");
            // obtenemos las fila de los totales
            const totalFila = document.querySelectorAll("#productos tfoot tr th");
            // bucle solo de la ultima columna
            for(let i = 4; i < columnas.length; i++) {
                let total=0;
                // obtenemos el valor de cada una de las filas
                filas.forEach((fila) => {
                    total += parseFloat(fila.querySelectorAll("td")[i].innerHTML);
                });
                // mostramos el total en la ultima fila
                totalFila[i].innerHTML = total.toFixed(2);
                totalProductos = total;
            }
            // variable total de productos

        }

        function redireccionar(){
            window.location = "{{ route('venta.index') }}";
        }

        function datos(){
            let materiales = [];
                let filaId = [];
            document.querySelectorAll('#productos tbody tr').forEach(function(e){
                filaId.push(e.querySelector('.id').innerText);
                let fila = {
                    id: e.querySelector('.id').innerText,
                    cantidad: e.querySelector('.cantidad').innerText,
                    venta: e.querySelector('.venta').innerText
                };
                materiales.push(fila);
            });


            //aquí instanciamos al componente padre
            var padre = document.getElementById("form_venta");
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

            //aquí agregamos el componente de tipo input
            var benificioOficina = document.createElement("input");
            //aquí indicamos que es un input de tipo text
            benificioOficina.type = 'hidden';
            benificioOficina.value = beneficioTotalOficina;
            benificioOficina.name = 'beneficio_oficina';
            //y por ultimo agreamos el componente creado al padre
            padre.appendChild(benificioOficina);

            //aquí agregamos el componente de tipo input
            var benificioPromotor = document.createElement("input");
            //aquí indicamos que es un input de tipo text
            benificioPromotor.type = 'hidden';
            benificioPromotor.value = beneficioTotalPromotor;
            benificioPromotor.name = 'beneficio_promotor';
            //y por ultimo agreamos el componente creado al padre
            padre.appendChild(benificioPromotor);

            //aquí agregamos el componente de tipo input
            var totalVenta = document.createElement("input");
            //aquí indicamos que es un input de tipo text
            totalVenta.type = 'hidden';
            totalVenta.value = totalProductos;
            totalVenta.name = 'total_venta';
            //y por ultimo agreamos el componente creado al padre
            padre.appendChild(totalVenta);

            //aquí agregamos el componente de tipo input
            var cantidadVenta = document.createElement("input");
            //aquí indicamos que es un input de tipo text
            cantidadVenta.type = 'hidden';
            cantidadVenta.value = cantidadTotal;
            cantidadVenta.name = 'cantidad_v';
            //y por ultimo agreamos el componente creado al padre
            padre.appendChild(cantidadVenta);

        }

    </script>
@endpush
