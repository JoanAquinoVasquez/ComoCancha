@extends('adminlte::page')

@section('title', 'miscanchas')

@section('content_header')
<h1>Mis Canchas</h1>
@stop

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-xl sm:rounded-lg p-6">
        <h3 class="text-lg font-semibold mb-4">Bienvenido {{ auth()->user()->name }} </h3>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="p-3">
                <h3 class="text-lg font-semibold mb-4"><i class="fas fa-futbol"></i> Mis Canchas</h3>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3 text-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Agregar</button>
            </div>
        </div>
    </div>
        <!--Tabla-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Canchitas</h6>
                <div class="input-group ml-auto" style="width: 300px;">
                    <input type="text" class="form-control" id="searchInput" placeholder="Buscar...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>IdCancha</th>
                                <th>Tipo</th>
                                <th>Direccion</th>
                                <th>Precio/h</th>
                                <th>Descripcion</th>
                                <th>IdUsuario</th>
                                <th>IdDeporte</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($canchas as $cancha)
                            <tr>
                                <td>{{ $cancha->id }}</td>
                                <td>{{ $cancha->tipo }}</td>
                                <td>{{ $cancha->ubicacion }}</td>
                                <td>{{ $cancha->precioporhora }}</td>
                                <td>{{ $cancha->descripcion }}</td>
                                <td>{{ $cancha->user->id }}</td>
                                <td>{{ $cancha->deporte->id }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm me-2">Editar</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" data-bs-id="{{ $cancha->id }}">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!--Fin Tabla-->
    </div>
        

@stop


@section('css')

<!-- Estilos de Bootstrap (puedes ajustar la versión según tu proyecto) -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Estilos de DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

@stop

@section('js')
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="addModalLabel"><i class="fas fa-plus"></i> Nueva Cancha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
                    <div class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price">Precio por hora</label>
                            <input type="number" class="form-control" id="price" placeholder="Precio por hora">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="code">Código</label>
                            <input type="text" class="form-control" id="code" placeholder="Código">
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <label for="location">Sede</label>
                            <select id="location" class="form-control">
                                <option selected>Seleccione...</option>
                                <option value="1">Sede 1</option>
                                <option value="2">Sede 2</option>
                                <option value="3">Sede 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sport">Deporte</label>
                            <select id="sport" class="form-control">
                                <option selected>Seleccione...</option>
                                <option value="1">Deporte 1</option>
                                <option value="2">Deporte 2</option>
                                <option value="3">Deporte 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="surface">Superficie</label>
                            <select id="surface" class="form-control">
                                <option selected>Seleccione...</option>
                                <option value="1">Superficie 1</option>
                                <option value="2">Superficie 2</option>
                                <option value="3">Superficie 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Descripción"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="saveButton">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necesario para DataTables) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
@stop