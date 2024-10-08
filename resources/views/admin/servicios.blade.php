@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
<h1></h1>
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
                <h3 class="text-lg font-semibold mb-4"><i class="fas fa-futbol"></i> Servicios</h3>
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
                <h6 class="m-0 font-weight-bold text-primary">Lista de Servicios</h6>
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
                                <th>IdServicio</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>   
                                <td>System Architect</td>                         
                                <td>$320,800</td>
                                <td><a href="#" class="btn btn-warning btn-sm me-2">Editar</a>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#" data-bs-id="1">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td>Donna Snider</td>
                                <td>System Architect</td>
                                <td>Customer Support</td>
                                <td>$320,800</td>
                                <td><a href="#" class="btn btn-warning btn-sm me-2">Editar</a>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#" data-bs-id="1">Eliminar</button></td>
                            </tr>
                            
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-plus"></i> Agregar Servicio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <!-- Nombre y Código -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" id="codigo" placeholder="Código">
                        </div>
                    </div>
                    <!-- Descripción -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-12">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" placeholder="Descripción" rows="4"></textarea>
                        </div>
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