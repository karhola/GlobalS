@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-between m-4 align-items-center">
    <h1>COMPRAS</h1>
    <a href="{{route('compra.create')}}" class="btn btn-primary">NUEVO</a>
</div>
<hr style="background-color: black; height: 3px;">
<div class="table-responsive mb-4 mt-4">
    <table class="table table-hover" style="width:100%" id="zero-config">
        <thead>
            <tr>
                <th>ID</th>
                <th>FECHA</th>
                <th>CANTIDAD</th>
                <th>COSTE DE IMPORTACION</th>
                <th>TOTAL</th>
                {{-- <th>PROVEEDOR</th> --}}
                {{-- <th>COMPRAS</th> --}}
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compras as $compra)
            <tr>
                <td>{{ $compra->id }}</td>
                <td>{{ $compra->fecha_compra }}</td>
                <td>{{ $compra->cantidad_compra }}</td>
                <td>{{ $compra->costo_importacion_total }}</td>
                <td>{{ $compra->total_compra }}</td>
                {{-- <td>{{ $compra->proveedors }}</td> --}}
                {{-- <td>
                    <a href="{{ route('compra.show', $compra->id) }}" class="badge badge-info">
                        Ver productos
                    </a>
                </td> --}}
                <td>
                    <div class="d-flex justify-content-begin">
                        <a href="{{route('compra.edit', $compra->id)}}" class="text-white bg-success p-1 rounded mr-1">
                            <i data-feather="edit"></i>
                        </a>
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('compra-destroy').submit();"
                            class="text-white bg-danger p-1 rounded mr-1"
                        >
                            <i data-feather="trash-2"></i>
                        </a>
                        <form id="compra-destroy" action="{{ route('compra.destroy', $compra->id) }}" method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminCork/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('AdminCork/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('AdminCork/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('AdminCork/plugins/font-icons/fontawesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminCork/plugins/font-icons/fontawesome/css/fontawesome.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('AdminCork/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('AdminCork/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('AdminCork/plugins/font-icons/feather/feather.min.js') }}"></script>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros ",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Buscar",
                "sLengthMenu": "Resultados :  _MENU_",
                "sZeroRecords": "No se encontraron resultados",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
        feather.replace();
    </script>
@endpush