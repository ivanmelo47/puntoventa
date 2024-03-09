@extends('layouts.admin')
@section('contenido')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LISTADO DE PRODUCTOS</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Productos</li>
                    </ol>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content-header -->

    <!-- Hoverable rows start -->
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-xl-12">
                            <form action="{{ route('producto.index') }}" method="get">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bi bi-search"></i></span>
                                            <input type="text" name="texto" id="" class="form-control"
                                                placeholder="Buscar Productos" value="{{ $texto }}"
                                                aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button type="submit" class="btn btn-outline-secondary"
                                                id="button-addon2">Buscar</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="bi bi-plus-circle-fill"></i></span>
                                            <a href="{{ route('producto.create') }}" class="btn btn-success">Nuevo</a>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                        </div>
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Stock</th>
                                        <th>Categoria</th>
                                        <th>Imagen</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($producto as $prod)
                                        <tr>
                                            <td>
                                                <a href="{{-- {{ route('producto.edit', $prod->id_producto) }} --}}" class="btn btn-warning btn-sm"><i
                                                        class="fas fa-pen"></i></a>
                                                <button type="button" class="btn btn-outline-danger btn-sm"
                                                    data-toggle="modal" data-target="{{-- #modal-delete-{{$prod->id_producto}} --}}"><i
                                                        class="bi bi-trash3"></i></button>
                                            </td>
                                            <td>{{ $prod->codigo }}</td>
                                            <td>{{ $prod->nombre }}</td>
                                            <td>{{ $prod->descripcion }}</td>
                                            <td>{{ $prod->stock }}</td>
                                            <!-- use la 'RELACION CARGADA' con categoria -->
                                            <td>{{ $prod->categoria->categoria }}</td>
                                            <td>
                                                <div class="producto-imagen">
                                                    <a href="/imagenes/productos/{{ $prod->imagen }}" data-lightbox="producto" data-title="{{ $prod->nombre }}">
                                                        <img src="/imagenes/productos/{{ $prod->imagen }}" alt="Imagen del producto" class="img-fluid">
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{ $prod->estatus }}</td>
                                        </tr>
                                        {{-- @include('almacen.producto.modal') --}} {{-- Se trata de la notificacion para confirmar la eliminacion de una producto --}}
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $producto->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@stop
