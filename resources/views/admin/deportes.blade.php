@extends('adminlte::page')

@section('title', 'deportes')

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
                <h3 class="text-lg font-semibold mb-4"><i class="fas fa-futbol"></i> Deportes</h3>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3 text-right">
<<<<<<< HEAD
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Agregar</button>
=======
                @role('Administrador')
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i 
                            class="fas fa-plus"></i> Agregar
                    </button>
                @endrole
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
            </div>
        </div>
    </div>
        <!--Tabla-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Lista de deportes</h6>
<<<<<<< HEAD
                <div class="input-group ml-auto" style="width: 300px;">
                    <input type="text" class="form-control" id="searchInput" placeholder="Buscar...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
=======
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>IdDeporte</th>
<<<<<<< HEAD
                                <th>Cancha</th>
                                <th>Deporte</th>
=======
                                <th>Nombre</th>
                                <th>Descripcion</th>
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
<<<<<<< HEAD
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>                            
                                <td>$320,800</td>
                                <td><a href="#" class="btn btn-warning btn-sm me-2">Editar</a>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#" data-bs-id="1">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td>Donna Snider</td>
                                <td>Customer Support</td>
                                <td>$320,800</td>
                                <td><a href="#" class="btn btn-warning btn-sm me-2">Editar</a>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#" data-bs-id="1">Eliminar</button></td>
                            </tr>
                            
=======
                            @foreach($deportes as $deporte)
                            <tr>
                                <td>{{$deporte->id}}</td>
                                <td>{{$deporte->nombre}}</td>
                                <td>{{$deporte->descripcion}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm me-2" data-toggle="modal" data-target="#editModal" 
                                        data-id="{{ $deporte->id }}" 
                                        data-nombre="{{ $deporte->nombre }}" 
                                        data-descripcion="{{ $deporte->descripcion }}">
                                        Editar
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm me-2" data-toggle="modal"
                                            data-target="#deleteModal" data-id="{{ $deporte->id }}">
                                            Eliminar
                                        </button>
                                </td>
                            </tr>
                            @endforeach
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<<<<<<< HEAD
        
        <!--Fin Tabla-->
    </div>
        
=======
        <!--Fin Tabla-->
    </div>
       
    <!-- Modal para agregar-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-plus"></i> Agregar Deporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('deportes.store') }}" method="POST">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="form-group col-md-12">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario"
                                value="{{ auth()->user()->name }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre del deporte">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Editar Deporte -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-edit"></i> Editar Deporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form id="editForm" method="POST" action="{{ route('deportes.update', $deporte->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_nombre">Nombre</label>
                        <input type="text" class="form-control" id="edit_nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_descripcion">Descripción</label>
                        <textarea class="form-control" id="edit_descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0

@stop


@section('css')

<<<<<<< HEAD
<!-- Estilos de Bootstrap (puedes ajustar la versión según tu proyecto) -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Estilos de DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
=======
    <!-- Estilos de Bootstrap (puedes ajustar la versión según tu proyecto) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Estilos de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0

@stop

@section('js')

<<<<<<< HEAD
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-plus"></i>Agregar Deporte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <!-- Cancha, Día, Código -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" id="codigo" placeholder="Código">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cancha">Cancha</label>
                            <select id="cancha" class="form-control">
                                <option selected>Seleccione...</option>
                                <option value="1">Cancha 1</option>
                                <option value="2">Cancha 2</option>
                                <option value="3">Cancha 3</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="deporte">Deporte</label>
                            <input type="text" class="form-control" id="deporte" placeholder="Deporte">
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

=======
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
<!-- jQuery (necesario para DataTables) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<<<<<<< HEAD
=======

    <script>
        $(document).ready(function() {
            // Inicializar DataTables
            $('#dataTable').DataTable();

            // Rellenar el modal de edición con los datos del deporte seleccionado
            $(document).on('click', '.btn-warning', function() {
                var deporteId = $(this).data('id');

                $.ajax({
                    url: '/deportes/' + deporteId,
                    method: 'GET',
                    success: function(data) {
                        // Rellenar el campo "Editar deporte" con los datos del deporte seleccionado
                        $('.modal-title').text('Editar Deporte '+ data.nombre);
                        $('#editModal #edit_nombre').val(data.nombre);
                        $('#editModal #edit_descripcion').val(data.descripcion);
                        $('#editForm').attr('action', '/deportes/' + deporteId);
                        $('#editModal').modal('show');
                    },
                    error: function(xhr) {
                        console.error('Error al obtener los datos del deporte:', xhr.responseText);
                    }
                });
            });
        });
    </script>

>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
@stop