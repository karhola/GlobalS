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
                <form action="{{ route('categoria.index') }}">
                    <select onchange="this.form.submit()" name="producto_id" class="custom-select">
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">
                                {{ $producto->nombre_producto }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        <div class="col">
            <label for="">Cantidad</label>
            <input type="text" class="form-control">
        </div>
        <div class="col">
            <label for="">Precio</label>
            <input type="text" class="form-control">
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-end">
        <button class="btn btn-info">Añadir producto</button>
    </div>
    <div class="row p-3">
        <div class="col border shadow p-3 rounded">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>karina</td>
                        <td>Cantidad</td>
                        <td>Precio</td>
                        <td>Total</td>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Subtotal:</th>
                        <th>209</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Importe:</th>
                        <th>29</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total a pagar:</th>
                        <th>2890</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
