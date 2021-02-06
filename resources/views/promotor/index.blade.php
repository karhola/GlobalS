@extends('admin.layout')
@section('content_title')
    <div class="d-flex justify-content-between p-3 align-items-center">
        <h1>Listado de promotores</h1>
        <a href="{{route('promotor.create')}}" class="btn btn-primary">NUEVO</a>
    </div>
@endsection
@section('content')
    <div class="table-responsive">
        <table id="style-1" class="table style-1 table-hover non-hover">
            <thead>
            <tr>
                <td>ID </td>
                <td>NOMBRE</td>
                <td>APELLIDO</td>
                <td>CELULAR</td>
                <td>PEDIDOS</td>
                <td>VENTAS</td>
                <td class="text-center">ACCIONES</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($promotors as $promotor)
                <tr>
                    <td>{{$promotor->id}}</td>
                    <td>{{$promotor->nombre_promotor}}</td>
                    <td>{{$promotor->apellido_promotor}}</td>
                    <td>{{$promotor->celular_promotor}}</td>
                    <td>
                        <a href="{{ route('promotor.show', $promotor) }}" class="badge badge-secondary">
                            Ver pedidos
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('promotor.showVenta', $promotor) }}" class="badge badge-primary">
                            Ver ventas
                        </a>
                    </td>
                    <td class="text-center">
                        <div class="dropdown custom-dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink{{ $promotor->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink{{ $promotor->id }}">
                                <a href="{{ route('ver.promotor', $promotor) }}" class="dropdown-item">
                                    Ver
                                </a>
                                <a href="{{route('promotor.edit',$promotor)}}" class="dropdown-item">
                                    Editar
                                </a>
                                <a
                                    onclick="event.preventDefault();
                                    document.getElementById('promotor-destroy{{ $promotor->id }}').submit();"
                                    class="dropdown-item"
                                >
                                    Eliminar
                                </a>
                                <form id="promotor-destroy{{ $promotor->id }}" action="{{ route('promotor.destroy', $promotor) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
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
    <link href="{{ asset('AdminCork/assets/css/elements/miscellaneous.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('AdminCork/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('AdminCork/plugins/font-icons/fontawesome/css/regular.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminCork/plugins/font-icons/fontawesome/css/fontawesome.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('AdminCork/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('AdminCork/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('AdminCork/plugins/font-icons/feather/feather.min.js') }}"></script>
    <script>
        $('#style-1').DataTable({
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
