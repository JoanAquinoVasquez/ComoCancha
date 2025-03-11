@extends('adminlte::page')

@section('title', 'horarios')

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
                <h3 class="text-lg font-semibold mb-4"><i class="fas fa-futbol"></i> Horarios de Atención</h3>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3 text-right">
<<<<<<< HEAD
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Agregar</button>
            </div>
        </div>
    </div>
        <!--Tabla-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Lista de horarios</h6>
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
                                <th>Idhorario</th>
                                <th>Cancha</th>
                                <th>Día</th>
                                <th>Inicio</th>
                                <th>Final</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>61</td>
                                <td>$320,800</td>
                                <td>$320,800</td>
                                <td><a href="#" class="btn btn-warning btn-sm me-2">Editar</a>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#" data-bs-id="1">Eliminar</button></td>
                            </tr>
                            <tr>
                                <td>Donna Snider</td>
                                <td>Customer Support</td>
                                <td>New York</td>
                                <td>$320,800</td>
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
        
=======
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
            <h6 class="m-0 font-weight-bold text-primary">Lista de horarios de atención</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Día</th>
                            <th>Inicio</th>
                            <th>Final</th>
                            <th>Cancha</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($horarios as $horario)
                        <tr>
                            <td>{{ $horario->id }} </td>
                            <td>{{ $horario->dia }} </td>
                            <td>{{ $horario->hora_inicio }} </td>
                            <td>{{ $horario->hora_fin }} </td>
                            <td>{{ $horario->cancha->tipo }} </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm me-2" data-toggle="modal"
                                    data-target="#editModal" data-id="{{ $horario->id }}">
                                    Editar
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#deleteModal" data-id="{{ $horario->id }}">
                                    Eliminar
                                </button>
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
   
<!-- Modal agregar -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-plus"></i> Agregar Horario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('horarios.store') }}">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="form-group col-md-12">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario"
                                value="{{ auth()->user()->name }}" readonly>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="cancha_id">Cancha</label>
                            <select id="cancha_id" name="cancha_id" class="form-control">
                                <option selected>Seleccione...</option>
                                @foreach($canchas as $cancha)
                                <option value="{{ $cancha->id }}">{{ $cancha->tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="dia">Día</label>
                            <select id="dia" name="dia" class="form-control">
                                <option selected>Seleccione...</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miércoles">Miércoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sábado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                            </select>
                    </div>
                    <!-- Hora de Inicio, Hora Final -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="hora_inicio">Hora de Inicio</label>
                            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="hora_fin">Hora Final</label>
                            <input type="time" class="form-control" id="hora_fin" name="hora_fin">
                        </div>
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
<!-- Modal editar -->
<!-- Modal para Editar Horario -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-edit"></i> Editar Horario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="editForm" method="POST">
            @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id" name="id">

                    <div class="form-group">
                        <label for="edit_dia">Día</label>
                        <select id="edit_dia" name="dia" class="form-control">
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miércoles">Miércoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sábado">Sábado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_hora_inicio">Hora de Inicio</label>
                        <input type="time" class="form-control" id="edit_hora_inicio" name="hora_inicio">
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_hora_fin">Hora Final</label>
                        <input type="time" class="form-control" id="edit_hora_fin" name="hora_fin">
                    </div>
                    
                    <div class="form-group">
                        <label for="edit_cancha_id">Cancha</label>
                        <select id="edit_cancha_id" name="cancha_id" class="form-control">
                            @foreach($canchas as $cancha)
                                <option value="{{ $cancha->id }}">{{ $cancha->tipo }}</option>
                            @endforeach
                        </select>
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


<!-- Modal eliminar -->
<!-- Modal para Confirmar Eliminación -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel"><i class="fas fa-trash"></i> Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar este horario?</p>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="delete_id" name="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0

@stop


@section('css')

<!-- Estilos de Bootstrap (puedes ajustar la versión según tu proyecto) -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Estilos de DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

@stop

@section('js')
<<<<<<< HEAD

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-plus"></i>Agregar Horario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <!-- Cancha, Día, Código -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="cancha">Cancha</label>
                            <select id="cancha" class="form-control">
                                <option selected>Seleccione...</option>
                                <option value="1">Cancha 1</option>
                                <option value="2">Cancha 2</option>
                                <option value="3">Cancha 3</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" id="codigo" placeholder="Código">
                        </div>
                    </div>
                    <!-- Fecha, Hora de Inicio, Hora Final -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" id="fecha">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="horaInicio">Hora de Inicio</label>
                            <input type="time" class="form-control" id="horaInicio">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="horaFinal">Hora Final</label>
                            <input type="time" class="form-control" id="horaFinal">
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
            $('#dataTable').DataTable();
        });

        $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var dia = button.closest('tr').find('td:nth-child(2)').text();
        var hora_inicio = button.closest('tr').find('td:nth-child(3)').text();
        var hora_fin = button.closest('tr').find('td:nth-child(4)').text();
        var cancha_id = button.closest('tr').find('td:nth-child(5)').data('cancha-id');

        var modal = $(this);
        modal.find('#edit_id').val(id);
        modal.find('#edit_dia').val(dia);
        modal.find('#edit_hora_inicio').val(hora_inicio);
        modal.find('#edit_hora_fin').val(hora_fin);
        modal.find('#edit_cancha_id').val(cancha_id);

        // Construimos la URL dinámica para el formulario de edición
        modal.find('#editForm').attr('action', '/horarios/' + id);
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');

        var modal = $(this);
        modal.find('#delete_id').val(id);

        // Construimos la URL dinámica para el formulario de eliminación
        modal.find('#deleteForm').attr('action', '/horarios/' + id);
    });

    </script>
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
@stop