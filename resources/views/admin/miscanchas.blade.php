@extends('adminlte::page')

@section('title', 'miscanchas')

@section('content_header')
    <h1>Mis Canchas</h1>
@stop

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h3 class="text-lg font-semibold mb-4">Bienvenido {{ auth()->user()->name }} </h3>
            @if (session('success'))
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
                @role('Administrador')
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i
                            class="fas fa-plus"></i> Agregar
                    </button>
                @endrole
                </div>
            </div>
        </div>
        <!--Tabla-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Canchitas</h6>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>N</th>
                                <th>Nombre</th>
                                <th>Direccion</th>
                                <th>Precio/h - Día</th>
                                <th>Precio/h - Noche</th>
                                <th>Descripcion</th>
                                <th>Sede</th>
                                @role('Administrador')
                                <th>Opciones</th>
                                @endrole
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($canchas as $index => $cancha)
                                <tr>
                                    <td>{{ $cancha->id }}</td> <!-- Número secuencial -->
                                    <td>{{ $cancha->tipo }}</td>
                                    <td>{{ $cancha->direccion }}</td>
                                    <td>
                                        @php
                                            $precioDia = $cancha->precio->where('turno', 'mañana')->first();
                                        @endphp
                                        {{ $precioDia ? $precioDia->amount : 'N/A' }}
                                    </td>
                                    <td>
                                        @php
                                            $precioNoche = $cancha->precio->where('turno', 'noche')->first();
                                        @endphp
                                        {{ $precioNoche ? $precioNoche->amount : 'N/A' }}
                                    </td>
                                    <td>{{ $cancha->descripcion }}</td>
                                    <td>{{ $cancha->sede->nombre }}</td>
                                    @role('Administrador')
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm me-2" data-id="{{ $cancha->id }}"
                                            data-toggle="modal" data-target="#editModal">Editar</a>
                                        <button type="button" class="btn btn-danger btn-sm me-2" data-toggle="modal"
                                            data-target="#deleteModal" data-id="{{ $cancha->id }}">
                                            Eliminar
                                        </button>
                                    </td>
                                    @endrole
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--Fin Tabla-->
    </div>

    <!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-plus"></i> Agregar Cancha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm" method="POST" action="{{ route('canchas.store') }}">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="form-group col-md-12">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario"
                                value="{{ auth()->user()->name }}" readonly>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <label for="tipo">Nombre</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                placeholder="Dirección">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="descripcion">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion"
                                placeholder="Descripción">
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <label for="deporte_id">Deporte</label>
                            <select id="deporte_id" name="deporte_id" class="form-control">
                                <option selected>Seleccione...</option>
                                @foreach ($deportes as $deporte)
                                    <option value="{{ $deporte->id }}">{{ $deporte->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sede_id">Sede</label>
                            <select id="sede_id" name="sede_id" class="form-control">
                                <option selected>Seleccione...</option>
                                @foreach ($sedes as $sede)
                                    <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="estado">Estado</label>
                            <select id="estado" name="estado" class="form-control">
                                <option value="0">Disponible</option>
                                <option value="1">Ocupada</option>
                                <option value="2">En mantenimiento</option>
                                <option value="3">No disponible</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="saveButton">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-edit"></i> Editar Cancha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tipo">Nombre</label>
                        <input type="text" class="form-control" id="tipo" name="tipo" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="deporte_id">Deporte</label>
                        <select class="form-control" id="deporte_id" name="deporte_id" required>
                            <!-- Opciones de deportes aquí -->
                            @foreach ($deportes as $deporte)
                                <option value="{{ $deporte->id }}">{{ $deporte->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sede_id">Sede</label>
                        <select class="form-control" id="sede_id" name="sede_id" required>
                            <!-- Opciones de sedes aquí -->
                            @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}">{{ $sede->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="0">Activo</option>
                            <option value="1">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar esta cancha?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger" id="deleteButton">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop

@section('css')

    <!-- Estilos de Bootstrap (puedes ajustar la versión según tu proyecto) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Estilos de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

@stop

@section('js')
    <!-- Existing scripts... -->

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteForm');

            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const canchaId = button.getAttribute('data-id');
                if (canchaId) {
                    deleteForm.action = `/miscanchas/${canchaId}`;
                } else {
                    console.error("No se pudo obtener el ID de la cancha.");
                }
            });
        });

        $(document).on('click', '.btn-warning', function() {
            var canchaId = $(this).data('id');
            $.get('/miscanchas/' + canchaId, function(data) {
                $('#editModal #tipo').val(data.tipo);
                $('#editModal #direccion').val(data.direccion);
                $('#editModal #descripcion').val(data.descripcion);
                $('#editModal #deporte_id').val(data.deporte_id);
                $('#editModal #sede_id').val(data.sede_id);
                $('#editModal #estado').val(data.estado);
                $('#editForm').attr('action', '/miscanchas/' + canchaId);
                $('#editModal').modal('show');
            });
        });



        // JavaScript for handling the Delete button click event
        $(document).on('click', '.btn-danger', function() {
            var canchaId = $(this).data('id');
            if (canchaId) {
                $('#deleteForm').attr('action', '/miscanchas/' + canchaId);
                $('#deleteModal').modal('show');
            } else {
                console.error("No se pudo obtener el ID de la cancha.");
            }
        });
    </script>
    <!-- jQuery (necesario para DataTables) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
@stop
