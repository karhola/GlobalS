@extends('admin.layout')
@section('content_title')
    <h1>Detalle de venta</h1>
@endsection
<hr style="background-color: black; height: 3px;">
@section('content')
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
                <select name="promotor_id" id="" class="custom-select">
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
                <label for="">Producto</label>
                <select name="" id="" class="custom-select">
                    <option value="">Elija un producto</option>
                </select>
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
                        <th>1</th>
                        <th>karina</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<form action="{{route('venta.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">CANTIDAD COMPRA </label>
        <input type="text" name="cantidad" class="form-control">
    </div>
    <div class="form-group">
        <label for="">PRECIO UNITARIO </label>
        <input type="text" name="precio_unitario" class="form-control">
    </div>
    <div class="form-group">
        <label for="">TOTAL DE LA VENTA </label>
        <input type="text" name="total_venta" class="form-control">
    </div>
    <button class="btn btn-primary">GUARDAR VENTA</button>
</form>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection
