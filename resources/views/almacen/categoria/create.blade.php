@extends('layouts.admin')
@section('contenido')

    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nueva Categoria</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form" role="form" method="POST" action="{{ route('categoria.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="categoria">Nombre</label>
                        <input type="text" class="form-control" id="categoria" name="categoria"
                            placeholder="Ingresa el nombre de la categoria">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                            placeholder="Ingresa la descripción">
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success me-1 mb-1">Guardar</button>
                        <button type="reset" class="btn btn-danger me-1 mb-1">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

@stop
