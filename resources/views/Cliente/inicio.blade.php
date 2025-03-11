@extends('Cliente.base')

@section('title', 'Inicio')

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
    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="col-5 d-flex align-items-center">
                <label for="deporte" class="form-label me-2">Deporte</label>
                <input type="text" class="form-control me-4 rounded-pill" id="deporte" placeholder="Ingrese el deporte">
            </div>
            <div class="col-5 d-flex align-items-center ms-4">
                <label for="ubicacion" class="form-label me-2">Ubicación</label>
                <input type="text" class="form-control rounded-pill" id="ubicacion" placeholder="Ingrese la ubicación">
            </div>
        </div>
    </div>
    <!---Imagenes-->
    <div class="container mt-5">
        <div class="row justify-content-center g-2">
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Imagen de ejemplo">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Imagen de ejemplo">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Imagen de ejemplo">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                
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




<!-- jQuery (necesario para DataTables) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
@stop