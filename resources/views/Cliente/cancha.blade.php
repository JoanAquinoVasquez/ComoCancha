@extends('Cliente.base')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container mt-5">
            <!-- Cabecera con Información de la Cancha -->
            <div class="d-flex justify-content-between align-items-center p-3 mb-2 bg-custom text-white rounded-pill px-5"
                style="background-color: #008149" data-cancha-id="{{ $cancha->id }}">
                <div class="d-flex align-items-center">
                    <h3>&nbsp;{{ $cancha->tipo }}</h3> <!-- Mostrar el tipo de cancha o el nombre -->
                </div>
                <div class="star-rating">
                    <!-- Sistema de valoración de estrellas -->
                    <span class="fa fa-star" style="cursor: pointer" id="1star"></span>
                    <span class="fa fa-star" style="cursor: pointer" id="2star"></span>
                    <span class="fa fa-star" style="cursor: pointer" id="3star"></span>
                    <span class="fa fa-star" style="cursor: pointer" id="4star"></span>
                    <span class="fa fa-star" style="cursor: pointer" id="5star"></span>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <!-- Sección de Imagen Principal -->
                <div class="col-md-4">
                    <div class="image-container">
                        <!-- Galería de Imágenes Verticales -->
                        @foreach ($cancha->galeria as $imagen)
                            <div class="mb-3">
                                <img src="{{ asset($imagen->image_path) }}" class="d-block w-100"
                                    style="height: 200px; object-fit: cover;" alt="Imagen de cancha">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    <h2 class="text-color mb-3">Reservar</h2>
                    <div class="row">
                        <!-- Sección de Datos de Reserva -->
                        <div class="col-md-6">
                            <div class="data-reservation">
                                <div class="mb-3">
                                    <h5 for="selecthora" class="form-label fw-bold mb-3">Seleccionar Hora:</h5>
                                    <select class="form-select" id="selecthora">
                                        <option selected>Seleccione su hora</option>
                                        <!-- Opciones de hora dinámicas -->
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <h5 for="timeOptions" class="form-label fw-bold">Tiempo y Precio:</h5>
                                    @foreach ($precios as $precio)
                                        <div class="form-check d-flex align-items-center">
                                            <input class="form-check-input me-2" type="checkbox"
                                                value="{{ $precio->amount }}" id="priceOption{{ $loop->index }}">
                                            <label class="form-check-label"
                                                for="priceOption{{ $loop->index }}">{{ $precio->turno }}</label>
                                            <span class="ms-2">S/. {{ $precio->amount }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Sección de Calendario -->
                        <div class="col-md-6">
                            <div class="calendar">
                                <h5 class="fw-bold">Elegir fecha:</h5>
                                <div class="container_calendar">
                                    <input type="text" id="datepicker" class="form-control"
                                        placeholder="Seleccione una fecha">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-bold">Seleccionar Hora:</h5>
                            <select class="form-select" id="selecthora">
                                <option selected>Seleccione su hora</option>
                                <!-- Las opciones se llenarán dinámicamente -->
                            </select>
                        </div>
                    </div>

                    <!-- Sección Información Adicional -->
                    <div class="card-deck mb-5">
                        <div class="card rounded-4 shadow">
                            <h5 class="card-header rounded-top-4" style="background-color: #008149; color: white">
                                Información</h5>
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <i class="fas fa-phone"></i>
                                        <span>+51 987654321</span>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-envelope"></i>
                                        <span>info@example.com</span>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{ $cancha->direccion }}</span>
                                    </li>
                                    <li class="list-group-item no-icon">
                                        <span>Deporte: {{ $cancha->deporte->nombre ?? 'No especificado' }}</span>
                                    </li>
                                    <li class="list-group-item no-icon">
                                        <span>Superficie: {{ $cancha->superficie ?? 'No especificada' }} Dimensiones:
                                            {{ $cancha->dimensiones ?? 'No especificadas' }}</span>
                                    </li>
                                    <li class="list-group-item no-icon">
                                        <span>Instalaciones: {{ $cancha->instalaciones ?? 'No especificadas' }}</span>
                                    </li>
                                    <li class="list-group-item no-icon">
                                        <span>Disponibilidad: {{ $cancha->disponibilidad ?? 'No especificada' }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Resumen de la Reserva -->
                        <div class="card rounded-4 shadow">
                            <h5 class="card-header rounded-top-4" style="background-color: #008149; color:white">Resumen de
                                la Reserva</h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="reservaTipo" class="form-label">Tipo de reserva:</label>
                                    <input type="text" class="form-control" id="reservaTipo" readonly
                                        value="Reserva de Cancha">
                                </div>
                                <div class="mb-3">
                                    <label for="reservaFecha" class="form-label">Fecha:</label>
                                    <input type="text" class="form-control" id="datepickerDisplay" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="reservaHora" class="form-label">Hora:</label>
                                    <input type="text" class="form-control" id="horaDisplay" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="reservaCosto" class="form-label">Costo:</label>
                                    <input type="text" class="form-control" id="costoDisplay" readonly>
                                </div>
                                <button class="btn btn-primary" id="confirmarReserva">Confirmar Reserva</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para Confirmar Reserva -->
        <div class="modal fade" id="modalConfirmarReserva" tabindex="-1" aria-labelledby="modalConfirmarReservaLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalConfirmarReservaLabel">Confirmación de Reserva</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Estás seguro de que deseas confirmar esta reserva?</p>
                        <p>Fecha: <span id="modalFecha"></span></p>
                        <p>Hora: <span id="modalHora"></span></p>
                        <p>Costo: <span id="modalCosto"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="confirmarReservaModal">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para manejar la selección de fecha y hora -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Obtener el ID de la cancha del atributo data-cancha-id
            var canchaId = $('.bg-custom').data('cancha-id');

            $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                autoclose: true,
                todayHighlight: true
            }).on('change', function() {
                var selectedDate = $(this).val();

                console.log('Fecha seleccionada:', selectedDate);
                console.log('ID de cancha:', canchaId);

                $.ajax({
                    url: "{{ route('get.available.hours') }}",
                    method: 'POST',
                    data: {
                        fecha: selectedDate,
                        cancha_id: canchaId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        var select = $('#selecthora');
                        select.empty();

                        if (data.length > 0) {
                            $.each(data, function(index, hour) {
                                select.append('<option value="' + hour + '">' + hour +
                                    '</option>');
                            });
                        } else {
                            select.append('<option value="">No hay horas disponibles</option>');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error al obtener las horas disponibles:', xhr
                            .responseText);
                    }
                });
            });
        });
    </script>
@endsection
