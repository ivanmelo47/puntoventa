@extends('layouts.admin')
@section('contenido')

    <!-- left column -->
    {{-- <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Editar Categoria {{ $categoria->categoria }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form" role="form" method="POST" action="{{ route('categoria.update', $categoria->id_categoria) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="categoria">Nombre</label>
                        <input type="text" class="form-control" id="categoria" name="categoria"
                            placeholder="Ingresa el nombre de la categoria" value="{{$categoria->categoria}}">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                            placeholder="Ingresa la descripción" value="{{$categoria->descripcion}}">
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                        <button type="button" class="btn btn-danger me-1 mb-1" id="botonCancelar">Cancelar</button>
                    </div>

                </div>
            </form>
        </div>
    </div> --}}

    @extends('layouts.admin')
@section('contenido')

    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Editar Producto {{$producto->nombre}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form" role="form" method="POST" action="{{ route('producto.update', $producto->id_producto) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre" name="nombre" placeholder="Ingresa el nombre del producto" value="{{$producto->nombre}}">
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="id_categoria">Categoria</label>
                                <select name="id_categoria" id="id_categoria" class="form-control">
                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->id_categoria }}" {{ $cat->id_categoria == $producto->id_categoria ? 'selected' : '' }}>
                                            {{ $cat->categoria }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="codigo">Codigo</label>
                                <input type="text" class="form-control @error('codigo') is-invalid @enderror"
                                    id="codigo" name="codigo" placeholder="Ingresa el codigo del producto" value="{{$producto->codigo}}">
                                @error('codigo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control @error('stock') is-invalid @enderror"
                                    id="stock" name="stock" placeholder="Ingresa el stock" value="{{$producto->stock}}">
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control @error('descripcion') is-invalid @enderror"
                                    id="descripcion" name="descripcion" placeholder="Ingresa la descripción" value="{{$producto->descripcion}}">
                                @error('descripcion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" onchange="previewImage(event)">
                                <div class="producto-imagen">
                                    <a class="preview-link" href="/imagenes/productos/{{ $producto->imagen }}" data-lightbox="producto" data-title="{{ $producto->nombre }}">
                                        <img src="/imagenes/productos/{{ $producto->imagen }}" alt="Imagen del producto" class="img-fluid preview-img">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                    <button type="reset" class="btn btn-danger me-1 mb-1">Limpiar</button>
                </div>
            </form>
        </div>
    </div>

@stop


@stop
