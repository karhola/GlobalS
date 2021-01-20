@extends('admin.layout')
@section('content')
    <h1>REGISTRO DE PRODUCTOS</h1>
    <hr style="background-color: black; height: 3px;">
    <form action="{{route('producto.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="">Nombre del producto</label>
                    <input type="text" name="nombre_producto" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Descripcion del producto</label>
                    {{-- <textarea type="text" name="descripcion_producto" id="demo1"></textarea> --}}
                    <textarea name="descripcion_producto" rows="7" id="editor" class="form-control">
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="">Stock del producto</label>
                    <input type="number" name="stock_producto" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Fecha de caducidad</label>
                    <input type="date" name="fecha_caducidad" class="form-control">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Seleccione una categoria</label>
                    <select name="categoria_id" class="custom-select">
                        <option selected disabled>Seleccione....</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">
                                {{$categoria->nombre_categoria}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <h5>Precio del producto</h5><br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Venta</label>
                            <input type="number" name="pventa_producto" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Compra</label>
                            <input type="number" name="pcompra_producto" class="form-control">
                        </div>
                    </div>
                </div>
                <h5>Beneficios del producto</h5><br>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="">Promotor</label>
                            <input type="number" name="beneficio_promotor" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="">Oficina</label>
                            <input type="number" name="beneficio_oficina" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>
                            Eliminar imagen
                            <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">
                            x
                            </a>
                        </label>
                        <label class="custom-file-container__custom-file" >
                            <input type="file" name="pfoto" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                </div>
            </div>
        </div>
        <hr style="background-color: black; height: 3px;">
        <div class="row">
            <div class="col">
                <button class="btn btn-primary btn-block">Guardar</button>
            </div>
            <div class="col">
                <button class="btn btn-outline-danger btn-block">Cancelar</button>
            </div>
        </div>
    </form>
@endsection

@push('styles')
    <link href="{{ asset('AdminCork/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('AdminCork/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" href="{{ asset('AdminCork/plugins/editors/markdown/simplemde.min.css') }}"> --}}
@endpush

@push('scripts')
    <script src="{{ asset('AdminCork/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('AdminCork/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.12.1/ckeditor.js"></script>
    {{-- <script src="{{ asset('AdminCork/plugins/editors/markdown/simplemde.min.js') }}"></script> --}}
    <script>
        var firstUpload = new FileUploadWithPreview('myFirstImage', {
            text: {
                browse: 'Buscar',
                chooseFile: 'Seleccion un archivo'
            },
        });
        CKEDITOR.replace('editor');
        CKEDITOR.config.height = 330;
        // new SimpleMDE({
        //     element: document.getElementById("demo1"),
        //     spellChecker: false,
        //     tabSize: 4,
        // });
    </script>
@endpush