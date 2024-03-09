@extends('layouts.admin')
@section('contenido')

    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nuevo Producto</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            {{-- <form class="form" role="form" method="POST" action="{{ route('producto.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre"
                                    placeholder="Ingresa el nombre del producto">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="id_categoria">Categoria</label>
                                <select name="id_categoria" id="id_categoria" class="form-control">
                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->id_categoria }}">{{ $cat->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="codigo">Codigo</label>
                                <input type="text" class="form-control" id="codigo" name="codigo"
                                    placeholder="Ingresa el codigo del producto">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control" id="stock" name="stock"
                                    placeholder="Ingresa el stock">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion"
                                    placeholder="Ingresa la descripción">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                        <button type="reset" class="btn btn-danger me-1 mb-1">Submit</button>
                    </div>

                </div>
            </form> --}}
            <form class="form" role="form" method="POST" action="{{ route('producto.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                    id="nombre" name="nombre" placeholder="Ingresa el nombre del producto">
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
                                        <option value="{{ $cat->id_categoria }}">{{ $cat->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="codigo">Codigo</label>
                                <input type="text" class="form-control @error('codigo') is-invalid @enderror"
                                    id="codigo" name="codigo" placeholder="Ingresa el codigo del producto">
                                @error('codigo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control @error('stock') is-invalid @enderror"
                                    id="stock" name="stock" placeholder="Ingresa el stock">
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control @error('descripcion') is-invalid @enderror"
                                    id="descripcion" name="descripcion" placeholder="Ingresa la descripción">
                                @error('descripcion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control @error('imagen') is-invalid @enderror"
                                    id="imagen" name="imagen" accept="image/*">
                                @error('imagen')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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