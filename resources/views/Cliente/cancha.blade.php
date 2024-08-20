@extends('Cliente.base')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container mt-5">
            <!-- Header con información de la cancha -->
            <div class="d-flex justify-content-between align-items-center p-3 mb-2 bg-custom text-white rounded-pill px-5"
                style="background-color: #008149" data-cancha-id="{{ $cancha->id }}">
                <div class="d-flex align-items-center">
                    <h3>&nbsp;{{ $cancha->tipo }}</h3>
                </div>
                <div class="star-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <span class="fa fa-star" style="cursor: pointer" id="{{ $i }}star"></span>
                    @endfor
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <!-- Sección de imágenes principales -->
                <div class="col-md-4">
                    <div class="image-container">
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
                        <!-- Sección de datos de reserva -->
                        <div class="col-md-6">
                            <div class="data-reservation">
                                <div class="mb-3">
                                    <h5 for="selecthora" class="form-label fw-bold mb-3">Seleccionar Hora:</h5>
                                    <input type="hidden" id="canchaId" value="{{ $cancha->id }}">
                                    <select class="form-select" id="selecthora">
                                        <option selected>Seleccione su hora</option>
                                        <!-- Las opciones de hora se llenarán aquí -->
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <h5 for="timeOptions" class="form-label fw-bold">Tiempo y Precio:</h5>
                                    @foreach ($precios as $precio)
                                        <div class="d-flex align-items-center">
                                            <span class="fw-bold">{{ mb_strtoupper($precio->turno, 'UTF-8') }}:</span>
                                            <span class="ms-2">S/. {{ number_format($precio->amount, 2) }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Sección de calendario -->
                        <div class="col-md-6">
                            <div class="calendar">
                                <h5 class="fw-bold">Elegir fecha:</h5>
                                <div class="container_calendar">
                                    <input type="text" id="datepicker" class="form-control"
                                        placeholder="Seleccione una fecha">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección de información adicional -->
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

                        <!-- Resumen de reserva -->
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
                                <button class="btn btn-primary" id="confirmarReserva" data-bs-toggle="modal"
                                    data-bs-target="#modalConfirmarReserva">Confirmar Reserva</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de confirmación -->
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

    <!-- Scripts para manejo de fecha y hora -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            // Inicializa el datepicker
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0, // Esto asegura que solo se pueden seleccionar fechas de hoy en adelante
                onSelect: function(dateText) {
                    // Cuando se selecciona una fecha, obtener horas disponibles
                    var canchaId = $('#canchaId').val();
                    $.ajax({
                        url: "{{ route('get.available.hours') }}",
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            cancha_id: canchaId,
                            fecha: dateText
                        },
                        success: function(response) {
                            // Llena el select con las horas disponibles
                            var selecthora = $('#selecthora');
                            selecthora.empty();
                            selecthora.append(
                                '<option selected>Seleccione su hora</option>');
                            $.each(response.horas, function(index, hora) {
                                var horaInicio = hora.value;
                                var horaFin = moment(hora.value, 'HH:mm:ss').add(1, 'hours').format('HH:mm:ss');
                                selecthora.append('<option value="' + horaInicio + '">' + horaInicio + ' - ' + horaFin + '</option>');
                            });
                        },
                        error: function() {
                            alert(
                                'Error al obtener las horas disponibles. Inténtelo de nuevo.'
                                );
                        }
                    });
                }
            });

            // Actualiza el resumen de reserva cuando cambian la fecha o la hora
            $('#datepicker, #selecthora').change(updateSummary);

            function updateSummary() {
                var selectedDate = $('#datepicker').val();
                var selectedTime = $('#selecthora').val();
                var cost = 0;
                var morningPrice = {{ $precios->where('turno', 'mañana')->first()->amount ?? 0 }};
                var afternoonPrice = {{ $precios->where('turno', 'noche')->first()->amount ?? 0 }};

                if (selectedTime) {
                    if (selectedTime >= '00:00' && selectedTime < '18:00') { // Mañana
                        cost = morningPrice;
                    } else { // Tarde
                        cost = afternoonPrice;
                    }
                }

                $('#datepickerDisplay').val(selectedDate);
                $('#horaDisplay').val(selectedTime);
                $('#costoDisplay').val('S/. ' + cost.toFixed(2));
            }

            // Confirmar reserva
            $('#confirmarReserva').on('click', function() {
                $('#modalFecha').text($('#datepickerDisplay').val());
                $('#modalHora').text($('#horaDisplay').val());
                $('#modalCosto').text($('#costoDisplay').val());
            });

            $('#confirmarReservaModal').on('click', function() {
                var canchaId = $('#canchaId').val();
                var fecha = $('#datepickerDisplay').val();
                var hora = $('#horaDisplay').val();
                var costo = $('#costoDisplay').val();
                $.ajax({
                    url: '{{ route('reservar.store') }}', // Reemplaza con tu ruta
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        cancha_id: canchaId,
                        fecha: fecha,
                        hora: hora,
                        costo: costo
                    },
                    success: function(response) {
                        alert('Reserva confirmada con éxito.');
                        location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 401) { // Usuario no autenticado
                            window.location.href =
                            '{{ route('login') }}'; // Redirige a la página de login
                        } else {
                            alert('Error al confirmar la reserva. Inténtalo de nuevo.');
                        }
                    }
                });
            });
        });
    </script>
@endsection
