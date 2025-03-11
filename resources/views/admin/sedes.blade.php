@extends('adminlte::page')

@section('title', 'sedes')

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
                <h3 class="text-lg font-semibold mb-4"><i class="fas fa-futbol"></i> Mis Sedes</h3>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3 text-right">
<<<<<<< HEAD
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Agregar</button>
=======
                @role('Administrador')
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Agregar</button>
                @endrole
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
            </div>
        </div>
    </div>
        <!--Tabla-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Sedes</h6>
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
                                <th>IdSede</th>
<<<<<<< HEAD
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Distrito</th>
                                <th>Descripción</th>
=======
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Direccion</th>
                                <th>Distrito</th>
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
<<<<<<< HEAD
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>61</td>
                                <td>$320,800</td>
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
                                <td>New York</td>
                                <td>$320,800</td>
                                <td>$320,800</td>
                                <td><a href="#" class="btn btn-warning btn-sm me-2">Editar</a>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#" data-bs-id="1">Eliminar</button></td>
                            </tr>
                            
=======
                            @foreach($sedes as $sede)
                            <tr>
                                <td>{{$sede->id}}</td>
                                <td>{{ $sede->nombre }}</td>
                                <td>{{ $sede->telefono }}</td>
                                <td>{{ $sede->email }}</td>
                                <td>{{ $sede->direccion }}</td>
                                <td>{{ $sede->distrito->nombre }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm me-2" data-toggle="modal" data-target="#editModal" 
                                        data-id="{{ $sede->id }}" 
                                        data-nombre="{{ $sede->nombre }}" 
                                        data-telefono="{{ $sede->telefono }}" 
                                        data-email="{{ $sede->email }}" 
                                        data-direccion="{{ $sede->direccion }}" 
                                        data-distrito="{{ $sede->distrito_id }}"><i class="fas fa-edit"></i> 
                                        Editar
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#" data-bs-id="1">Eliminar</button></td>
                            </tr>
                            @endforeach
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!--Fin Tabla-->
    </div>
        
<<<<<<< HEAD
=======
<!-- Modal agregar-->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-plus"></i> Agregar Sedes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm" action="{{ route('sedes.store') }}" method="POST">
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
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telefono" placeholder="Telefono">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Dirección">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Correo</label>
                            <input type="text" class="form-control" id="email" placeholder="Correo">
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="distrito">Distrito</label>
                            <select class="form-control" id="distrito">
                                @foreach($distritos as $distrito)
                                <option value="{{ $distrito->id }}">{{ $distrito->nombre }}</option>
                                @endforeach
                            </select>
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

<!-- Modal para Editar Sede -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-edit"></i> Editar Sede</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <label for="edit_nombre">Nombre</label>
                        <input type="text" class="form-control" id="edit_nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_telefono">Telefono</label>
                        <input type="text" class="form-control" id="edit_telefono" name="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Correo</label>
                        <input type="text" class="form-control" id="edit_email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_direccion">Dirección</label>
                        <input type="text" class="form-control" id="edit_direccion" name="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_distrito">Distrito</label>
                        <select class="form-control" id="edit_distrito" name="distrito" required>
                            @foreach($distritos as $distrito)
                            <option value="{{ $distrito->id }}">{{ $distrito->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_descripcion">Descripción</label>
                        <textarea class="form-control" id="edit_descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-plus"></i> Agregar Sedes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <!-- Código y Nombre -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" id="codigo" placeholder="Código">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                        </div>
                    </div>
                    <!-- Nombre Dirección -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre Dirección</label>
                            <input type="text" class="form-control" id="nombreDireccion" placeholder="Nombre Dirección">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Dirección">
                        </div>
                    </div>
                    <!-- Descripción -->
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
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

=======
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0

<!-- jQuery (necesario para DataTables) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<<<<<<< HEAD
=======

<!-- Obtener los datos de la fila seleccionada -->
<script>
     $(document).ready(function() {
    // Inicializar DataTables
    $('#dataTable').DataTable();

    $(document).on('click', '.btn-warning', function() {
        var sedeId = $(this).data('id');
        console.log('ID de la sede:', sedeId); // Verificar el ID de la sede

        $.ajax({
            url: '/sedes/' + sedeId,
            method: 'GET',
            success: function(data) {
                console.log('Datos recibidos:', data); // Verificar los datos recibidos

                $('#edit_nombre').val(data.nombre);
                $('#edit_telefono').val(data.telefono);
                $('#edit_email').val(data.email);
                $('#edit_direccion').val(data.direccion);
                $('#edit_distrito').val(data.distrito_id);
                $('#edit_descripcion').val(data.descripcion);

                // Abrir el modal
                $('#editModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud AJAX:', error); // Verificar si hay algún error en la solicitud AJAX
            }
        });
    });

    // Manejar el envío del formulario con AJAX
    $('#editForm').on('submit', function(event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

        var formData = $(this).serialize(); // Serializar los datos del formulario

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: formData,
            success: function(response) {
                console.log('Formulario enviado exitosamente:', response);
                // Cerrar el modal
                $('#editModal').modal('hide');
                // Actualizar la tabla o realizar cualquier otra acción necesaria
            },
            error: function(xhr, status, error) {
                console.error('Error al enviar el formulario:', error);
            }
        });
    });
});

</script>
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
@stop