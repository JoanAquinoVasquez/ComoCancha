@extends('Cliente.base')

@section('title', 'Nosotros')

@section('content_header')
<h1></h1>
@stop

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="container mt-5">
        <div class="d-flex justify-content-center align-items-center p-3 mb-2 bg-custom text-white rounded-pill " style="background-color: #008149">
            <img src="vendor/adminlte/dist/img/comocannchablanco.png" style="height:40px; width:auto" alt="Logo" class="logo">
            <h3>&nbsp Juega donde quieras, cuando quieras.</h3>
        </div>
    </div>
    <div class="container mt-5 ">
        <div class="col-10 p-3 mb-2 bg-white text-black mx-auto text-center rounded-xl" style="border-radius: 16px; border: 2px solid #008149;">
            <h3 class="text-success">Historia</h3>
            <hr style="border-top: 2px solid #008149;">
            En 2022, un grupo de amigos de Chiclayo, apasionados por el deporte y la tecnología, notaron la dificultad para encontrar y reservar canchas deportivas en la ciudad. Decidieron crear CanchasChiclayo, una plataforma digital que simplificara el proceso de reserva, ofreciendo información en tiempo real y facilidad de uso.

        </div> 
        <div class="container mt-5">
            <div class="d-flex justify-content-center gap-3">
                <div class="col-5 p-3  bg-white text-black text-center rounded-xl" style="border-radius: 16px; border: 2px solid #008149;">
                    <h3 class="text-success">Misión</h3>
            <hr style="border-top: 2px solid #008149;">
            Facilitar el acceso a espacios deportivos de calidad en Chiclayo, promoviendo el bienestar físico y social a través de una plataforma innovadora y fácil de usar. Nuestro objetivo es conectar a los usuarios con una amplia variedad de canchas disponibles, brindando una experiencia de reserva rápida, conveniente y segura para fomentar la práctica del deporte en nuestra comunidad

                </div>
                <div class="col-5 p-3 bg-white text-black text-center rounded-xl" style="border-radius: 16px; border: 2px solid #008149;">
                    <h3 class="text-success">Visión</h3>
            <hr style="border-top: 2px solid #008149;">
            Ser la plataforma líder en alquiler de canchas en Chiclayo, reconocida por su compromiso con la calidad del servicio, la innovación tecnológica y el fomento de una comunidad activa y saludable. Aspiramos a expandir nuestras operaciones para incluir una gama más amplia de actividades deportivas y recreativas, convirtiéndonos en un referente en la promoción del deporte y el bienestar en la región.
                </div>
            </div>
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

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editModalLabel"><i class="fas fa-plus"></i> Agregar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <!-- Nombre, Edad, Código -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="edad">Edad</label>
                            <input type="number" class="form-control" id="edad" placeholder="Edad">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" id="codigo" placeholder="Código">
                        </div>
                    </div>
                    <!-- DNI, Teléfono -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control" id="dni" placeholder="DNI">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" placeholder="Teléfono">
                        </div>
                    </div>
                    <!-- Dirección -->
                    <div class="form-row mb-3">
                        <div class="form-group col-md-12">
                            <label for="direccion">Dirección</label>
                            <textarea class="form-control" id="direccion" placeholder="Dirección" rows="3"></textarea>
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