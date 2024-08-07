@extends('Cliente.base')

@section('title', 'Inicio')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container mt-5">
            <div class="d-flex justify-content-center align-items-center p-3 mb-2 bg-custom text-white rounded-pill "
                style="background-color: #008149">
                <img src="vendor/adminlte/dist/img/comocannchablanco.png" style="height:40px; width:auto" alt="Logo"
                    class="logo">
                <h3>&nbsp Juega donde quieras, cuando quieras.</h3>
            </div>
        </div>
        <div class="container mt-5">
            <div class="d-flex justify-content-center">
                <div class="col-5 d-flex align-items-center">
                    <label for="deporte" class="form-label me-2">Deporte</label>
                    <input type="text" class="form-control me-4 rounded-pill" id="deporte"
                        placeholder="Ingrese el deporte">
                </div>
                <div class="col-5 d-flex align-items-center ms-4">
                    <label for="ubicacion" class="form-label me-2">Ubicación</label>
                    <input type="text" class="form-control rounded-pill" id="ubicacion"
                        placeholder="Ingrese la ubicación">
                </div>
            </div>
        </div>
        <!---Imagenes-->
        <!---Imagenes-->
        <div class="container mt-5">
            <div class="row justify-content-center g-2">
                @foreach ($canchas as $cancha)
                    <div class="col-md-4">
                        <div class="card h-100" style="width: 100%;">
                            <!-- Carousel -->
                            @if ($cancha->galeria->count() > 1)
                                <div id="carousel-{{ $cancha->id }}" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($cancha->galeria as $index => $imagen)
                                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                <img src="{{ asset($imagen->image_path) }}" class="d-block w-100"
                                                    style="height: 200px; object-fit: cover;" alt="Imagen de cancha">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-{{ $cancha->id }}" role="button"
                                        data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-{{ $cancha->id }}" role="button"
                                        data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            @else
                                <img src="{{ asset($cancha->galeria->first()->image_path) }}" class="card-img-top"
                                    style="height: 200px; object-fit: cover;" alt="Imagen de cancha">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $cancha->tipo }}</h5>
                                <p class="card-text">{{ $cancha->descripcion }}</p>
                                <p class="card-text"><strong>Ubicación:</strong> {{ $cancha->direccion }}</p>
                                <p class="card-text">
                                    <strong>Precio por hora en el Día: </strong> S/.
                                    {{ $cancha->precio->where('turno', 'mañana')->first()->amount ?? 'N/A' }}
                                </p>
                                <p class="card-text">
                                    <strong>Precio por hora en la Noche: </strong> S/.
                                    {{ $cancha->precio->where('turno', 'noche')->first()->amount ?? 'N/A' }}
                                </p>
                                <div class="mt-auto">
                                    <!-- Puedes agregar botones aquí si es necesario -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>


@stop


@section('css')

    <style>
        .carousel-item img {
            height: 200px;
            /* Ajusta según sea necesario */
            object-fit: cover;
        }
    </style>
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
