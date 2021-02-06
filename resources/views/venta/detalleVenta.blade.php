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
    <hr style="background-color: black; height: 3px;">
    <br>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="">Promotor</label>
                <input type="text" value="{{ $venta->promotor->nombre_promotor }}" class="form-control" disabled >
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="">Fecha de venta</label>
                <input disabled type="date" value="{{ $venta->fecha_venta }}" name="fecha_venta" class="form-control">
            </div>
        </div>
    </div>
    <div class="row p-3">
      <div class="col border shadow p-4 rounded table table-responsive">
            <table class="table" id="productos">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Precio de venta</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($productos as $producto)
                      <tr>
                        <th>{{ $producto->id }}</th>
                        <th>{{ $producto->nombre_producto }}</th>
                        <th>{{ $producto->pventa_producto }}</th>
                        <th>{{ $producto->categoria->nombre_categoria }}</th>
                      </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>

@endsection
