@extends('Cliente.base')

@section('content')
<<<<<<< HEAD
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center p-3 mb-2 bg-custom text-white rounded-pill px-5" style="background-color: #008149">
            <div class="d-flex align-items-center">
                <h3>&nbsp;DeporPlaza Campo de Marte</h3>
            </div>
            <div class="star-rating">
                <!-- Sistema de valoración de estrellas -->
                <span class="fa fa-star" onclick="calificar(this)" style="cursor: pointer" id="1star"></span>
                <span class="fa fa-star" onclick="calificar(this)" style="cursor: pointer" id="2star"></span>
                <span class="fa fa-star" onclick="calificar(this)" style="cursor: pointer" id="3star"></span>
                <span class="fa fa-star" onclick="calificar(this)" style="cursor: pointer" id="4star"></span>
                <span class="fa fa-star" onclick="calificar(this)" style="cursor: pointer" id="5star"></span>
=======
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
                                    data-bs-target="#modalConfirmarReserva">Reservar</button>

                                <button type="button" class="btn btn-custom rounded-pill" data-bs-toggle="modal"
                                    data-bs-target="#paymentModal">Pagar Ahora</button>
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
                        <button type="button" class="btn btn-primary" id="confirmarReservaModal">Reservar</button>
                    </div>
                </div>
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
            </div>
        </div>
    </div>

<<<<<<< HEAD
    <div class="container mt-5">
        <div class="row">
            <!-- Sección de Imagen -->
            <div class="col-md-5">
                <div class="image-container">
                    <img class="rounded-4" src="https://via.placeholder.com/400x400" alt="Imagen de Ejemplo">
                </div>
            </div>
            <div class="col-md-7">
                <h2 class="text-color mb-3">Reservar</h2>
                <div class="row">
                    <!-- Sección de Datos de Reserva -->
                    <div class="col-md-6">
                        <div class="data-reservation">
                            <div class="mb-3">
                                <h5 for="selectcancha" class="form-label fw-bold mb-3">Elegir cancha:</h5>
                                <select class="form-select" id="selectcancha">
                                    <option selected>Seleccionar cancha</option>
                                    <option value="1">Cancha 1</option>
                                    <option value="2">Cancha 2</option>
                                    <option value="3">Cancha 3</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <h5 for="selecthora" class="form-label fw-bold mb-3">Seleccionar Hora:</h5>
                                <select class="form-select" id="selecthora">
                                    <option selected>Seleccione su hora</option>
                                    <option value="1">7 p.m.</option>
                                    <option value="2">8 p.m.</option>
                                    <option value="3">10 p.m.</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <h5 for="timeOptions" class="form-label fw-bold">Tiempo y Precio:</h5>
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input me-2" type="checkbox" value="270" id="priceOption1">
                                    <label class="form-check-label" for="priceOption1">
                                        60 min
                                    </label>
                                    <span class="ms-2">S/. 270</span>
                                </div>
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input me-2" type="checkbox" value="300" id="priceOption2">
                                    <label class="form-check-label" for="priceOption2">
                                        90 min
                                    </label>
                                    <span class="ms-2">
                                        S/. 300</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sección de Calendario -->
                    <div class="col-md-6">
                        <div class="calendar">
                            <h5 class="fw-bold">Elegir fecha:</h5>
                            <div class="container_calendar">
                                <div class="header_calendar">
                                    <!--
                                    <h1 id="text_day">00</h1>
                                    <h5 id="text_month">Null</h5>  
                                    -->
                                </div>
                                <div class="body_calendar">
                                    <div class="container_details">
                                        <div class="detail_1">
                                            <div class="detail">
                                                <div class="circle">
                                                    <div class="column"></div>
                                                </div>
                                            </div>
                                            <div class="detail">
                                                <div class="circle">
                                                    <div class="column"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="detail_2">
                                            <div class="detail">
                                                <div class="circle">
                                                    <div class="column"></div>
                                                </div>
                                            </div>
                                            <div class="detail">
                                                <div class="circle">
                                                    <div class="column"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container_change_month">
                                        <button id="last_month">&lt;</button>
                                        <div>
                                            <span id="text_month_02">Null</span>
                                            <span id="text_year">0000</span>
                                        </div>
                                        <button id="next_month">&gt;</button>
                                    </div>
                                    <div class="container_weedays">
                                        <span class="week_days_item">D</span>
                                        <span class="week_days_item">L</span>
                                        <span class="week_days_item">M</span>
                                        <span class="week_days_item">M</span>
                                        <span class="week_days_item">J</span>
                                        <span class="week_days_item">V</span>
                                        <span class="week_days_item">S</span>
                                    </div>
                                    <div class="container_days align-items-center">
                                        <span class="week_days_item item_day"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sección Información adicional -->
                    
                    <!-- Botón de Reservar -->
                </div>
            </div>
        </div>
        <div class="card-deck mb-5">
            <div class="card rounded-4 shadow">
                <h5 class="card-header rounded-top-4" style="background-color: #008149; color: white">
                    Información
                </h5>
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
                            <span>Av. Alfonso Ugarte</span>
                        </li>
                        <li class="list-group-item no-icon">
                            <span>Deporte: Fútbol</span>
                        </li>
                        <li class="list-group-item no-icon">
                            <span>Superficie: Césped natural Dimensiones: 105m x 68m</span>
                        </li>
                        <li class="list-group-item no-icon">
                            <span>Instalaciones: Vestuarios, duchas, estacionamiento</span>
                        <li class="list-group-item no-icon">
                            <span>Disponibilidad: Lunes a Domingo 08:00 - 10:00, 16:00 - 18:00</span>                       
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card rounded-4 shadow">
                <h5 class="card-header rounded-top-4" style="background-color: #008149; color:white">
                    Resumen de la Reserva
                </h5>
                <div class="card-body">
                    <form>
                        <div class="form-group row">
                          <label for="fecha" class="col-sm-4 col-form-label">Fecha:</label>
                          <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="fecha" value="08/08/2024">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="hinicio" class="col-sm-4 col-form-label">Hora de inicio:</label>
                          <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="hinicio" value="11:00">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="hfin" class="col-sm-4 col-form-label">Hora de fin:</label>
                          <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="hfin" value="13:00">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="precio" class="col-sm-4 col-form-label">Precio Total:</label>
                          <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="precio" value="S/. 120.00">
                          </div>
                        </div>
                        <div class="form-group row py-4">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-custom rounded-pill">Reservar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>  
</div>
@stop
=======

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Pasarela de Pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h6>Métodos de Pago</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard"
                                    value="creditCard" checked>
                                <img src="{{ asset('img/logovisa.jpg') }}" class="payment-method-img2" alt="">
                                <label class="form-check-label" for="creditCard">
                                    Tarjeta de Crédito/Débito
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="yape"
                                    value="yape">
                                <img src="{{ asset('img/logoyape.png') }}" class="payment-method-img" alt="">
                                <label class="form-check-label" for="yape">
                                    Yape
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8" id="paymentDetails">
                            <!-- Aquí se cargará dinámicamente el formulario según la selección -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer center">
                    <button type="button" class="btn btn-pagar" id="payButton">Pagar</button>
                </div>
                <div id="paymentPopup" class="popup">
                    <div class="popup-content">
                        <div id="paymentDetails"></div>
                        <div id="message" class="message"></div> <!-- Contenedor para mensajes -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        /* Estilos generales para el popup */
        .modal-content {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background-color: #008149;
            color: white;
            padding: 16px;
            border-bottom: none;
        }

        .modal-title {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .modal-body {
            padding: 30px;
            background-color: #f8f9fa;
        }

        .modal-footer {
            border-top: none;
            padding: 16px 30px;
            justify-content: space-between;
        }

        /* Estilos para los métodos de pago */
        h6 {
            font-weight: bold;
            margin-bottom: 15px;
            color: #008149;
        }

        .form-check-label {
            margin-left: 10px;
            font-size: 1.1rem;
        }

        .form-check-input:checked+.form-check-label {
            font-weight: bold;
            color: #008149;
        }

        /* Estilos para los inputs */
        .form-control {
            border-radius: 10px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            font-size: 1rem;
        }

        /* Botones personalizados */
        .btn-custom {
            background-color: #008149;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #005f36;
        }

        .btn-close {
            background-color: white;
            padding: 0.5rem;
            border-radius: 50%;
            border: 2px solid #008149;
        }

        .btn-close:hover {
            background-color: #f8f9fa;
        }

        /* Personalización del radio button */
        .form-check-input[type="radio"] {
            appearance: none;
            width: 1.5em;
            height: 1.5em;
            border-radius: 50%;
            background-color: #e9ecef;
            border: 2px solid #008149;
            transition: background-color 0.3s ease;
            margin-top: 0.3rem;
        }

        .form-check-input[type="radio"]:checked {
            background-color: #008149;
            border-color: #005f36;
        }

        .form-check-input[type="radio"]:focus {
            outline: none;
            box-shadow: 0 0 0 0.25rem rgba(0, 129, 73, 0.25);
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .payment-method-img {
            width: 50px;
            margin: 10px;
            height: auto;
            margin-right: 10px;
        }

        .payment-method-img2 {
            width: 100px;
            margin: 10px;
            height: auto;
            margin-right: 10px;
        }

        /* Centrar el contenido del pie del modal */
        .modal-footer.center {
            display: flex;
            justify-content: center;
            padding: 1rem;
        }

        /* Estilo para el botón */
        .btn-pagar {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 0.25rem;
            font-size: 1rem;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-pagar:hover {
            background-color: #218838;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn-pagar:focus {
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.25);
        }
    </style>

    <!-- Scripts para manejo de fecha y hora -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentDetails = document.getElementById('paymentDetails');
            const payButton = document.getElementById('payButton');
            const messageDiv = document.getElementById('message');

            const creditCardForm = `
        <h6>Detalles de la Tarjeta</h6>
        <div class="mb-3">
            <label for="cardNumber" class="form-label">Número de Tarjeta</label>
            <input type="text" class="form-control" id="cardNumber" placeholder="** ** ** **">
        </div>
        <div class="mb-3">
            <label for="cardName" class="form-label">Nombre en la Tarjeta</label>
            <input type="text" class="form-control" id="cardName">
        </div>
        <div class="mb-3 row">
            <div class="col mb-3">
                <label for="expiryDate" class="form-label">Fecha de Expiración</label>
                <input type="text" class="form-control" id="expiryDate" placeholder="MM/AA" maxlength="5">
            </div>
            <div class="col mb-3">
                <label for="cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cvv" placeholder="*">
            </div>
        </div>
    `;

            const yapeForm = `
        <h6>Detalles de Yape</h6>
        <div class="mb-3" id="phoneContainer">
            <label for="phoneNumber" class="form-label">Número de Teléfono</label>
            <input type="text" class="form-control" id="phoneNumber" placeholder="999 999 999">
        </div>
        <div class="mb-3">
            <label for="yapeCode" class="form-label">Código de Confirmación</label>
            <input type="text" class="form-control" id="yapeCode" placeholder="**">
        </div>
    `;

            const attachCardEvents = () => {
                const cardNumberInput = document.getElementById('cardNumber');
                const expiryDateInput = document.getElementById('expiryDate');
                const cvvInput = document.getElementById('cvv');

                const formatCardNumber = (value) => {
                    value = value.replace(/\D/g, '');
                    // Limita la longitud a 16 dígitos
                    value = value.substring(0, 16);
                    return value.replace(/(.{4})/g, '$1 ').trim();
                };

                cardNumberInput.addEventListener('input', function(e) {
                    e.target.value = formatCardNumber(e.target.value);
                });

                cardNumberInput.addEventListener('blur', function(e) {
                    const value = e.target.value.replace(/\s+/g, '');
                    if (value.length !== 16) {
                        showMessage('El número de tarjeta debe tener 16 dígitos.', 'error');
                        e.target.focus();
                    }
                });

                expiryDateInput.addEventListener('input', function(e) {
                    e.target.value = e.target.value.replace(/[^0-9/]/g, '');
                });

                cvvInput.addEventListener('input', function(e) {
                    e.target.value = e.target.value.replace(/[^0-9]/g, '');
                    e.target.value = e.target.value.substring(0, 3);
                });
            };

            const attachYapeEvents = () => {
                const phoneNumberInput = document.getElementById('phoneNumber');
                const yapeCodeInput = document.getElementById('yapeCode');

                phoneNumberInput.addEventListener('input', function(e) {
                    e.target.value = e.target.value.replace(/\D/g, '');
                    if (e.target.value.length > 9) {
                        e.target.value = e.target.value.slice(0, 9);
                    }
                });

                yapeCodeInput.addEventListener('input', function(e) {
                    e.target.value = e.target.value.replace(/[^0-9]/g, '');
                    if (e.target.value.length > 6) {
                        e.target.value = e.target.value.slice(0, 6);
                    }
                });
            };

            const showMessage = (message, type) => {
                messageDiv.textContent = message;
                messageDiv.className = type; // Ajustado para aplicar la clase de tipo
            };

            const updatePaymentDetails = () => {
                const selectedMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
                paymentDetails.innerHTML = selectedMethod === 'creditCard' ? creditCardForm : yapeForm;

                if (selectedMethod === 'creditCard') {
                    attachCardEvents();
                } else {
                    attachYapeEvents();
                }
            };

            payButton.addEventListener('click', function(e) {
                e.preventDefault();
                const selectedMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
                let isValid = false;

                if (selectedMethod === 'creditCard') {
                    const cardNumber = document.getElementById('cardNumber').value.replace(/\s+/g, '');
                    const expiryDate = document.getElementById('expiryDate').value;
                    const cvv = document.getElementById('cvv').value;

                    if (cardNumber.length === 16 && /^(0[1-9]|1[0-2])\/\d{2}$/.test(expiryDate) && /^\d{3}$/
                        .test(cvv)) {
                        isValid = true;
                    } else {
                        showMessage('Por favor, completa todos los campos correctamente.', 'error');
                    }
                } else {
                    const phoneNumber = document.getElementById('phoneNumber').value;
                    const yapeCode = document.getElementById('yapeCode').value;

                    if (phoneNumber.length === 9 && /^\d{6}$/.test(yapeCode)) {
                        isValid = true;
                    } else {
                        showMessage('Por favor, completa todos los campos correctamente.', 'error');
                    }
                }

                if (isValid) {
                    const canchaId = $('#canchaId').val();
                    const fecha = $('#datepickerDisplay').val();
                    const hora = $('#horaDisplay').val();
                    const costo = $('#costoDisplay').val();

                    $.ajax({
                        url: '{{ route('reservar.store') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            cancha_id: canchaId,
                            fecha: fecha,
                            hora: hora,
                            costo: costo,
                            action: selectedMethod === 'creditCard' ? 'Tarjeta' :
                                'Yape' // Acción basada en el método de pago
                        },
                        success: function(response) {
                            alert('Reserva confirmada con éxito.');
                            location.reload();
                        },
                        error: function(xhr) {
                            if (xhr.status === 401) {
                                window.location.href = '{{ route('login') }}';
                            } else {
                                showMessage('Error al procesar la reserva. Inténtalo de nuevo.',
                                    'error');
                            }
                        }
                    });
                }
            });

            document.querySelectorAll('input[name="paymentMethod"]').forEach(input => {
                input.addEventListener('change', updatePaymentDetails);
            });

            updatePaymentDetails();
        });

        $(document).ready(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                onSelect: function(dateText) {
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
                            var selecthora = $('#selecthora');
                            selecthora.empty();
                            selecthora.append(
                                '<option selected>Seleccione su hora</option>');
                            $.each(response.horas, function(index, hora) {
                                var horaInicio = hora.value;
                                var horaFin = moment(hora.value, 'HH:mm:ss').add(1,
                                    'hours').format('HH:mm:ss');
                                selecthora.append('<option value="' + horaInicio +
                                    '">' + horaInicio + ' - ' + horaFin +
                                    '</option>');
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

            $('#datepicker, #selecthora').change(updateSummary);

            function updateSummary() {
                var selectedDate = $('#datepicker').val();
                var selectedTime = $('#selecthora').val();
                var cost = 0;
                var morningPrice = {{ $precios->where('turno', 'mañana')->first()->amount ?? 0 }};
                var afternoonPrice = {{ $precios->where('turno', 'noche')->first()->amount ?? 0 }};

                if (selectedTime) {
                    if (selectedTime >= '00:00' && selectedTime < '18:00') {
                        cost = morningPrice;
                    } else {
                        cost = afternoonPrice;
                    }
                }

                $('#datepickerDisplay').val(selectedDate);
                $('#horaDisplay').val(selectedTime);
                $('#costoDisplay').val('S/. ' + cost.toFixed(2));
            }

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
                    url: '{{ route('reservar.store') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        cancha_id: canchaId,
                        fecha: fecha,
                        hora: hora,
                        costo: costo,
                        action: 'confirmar' // Indicador de que solo se confirma la reserva

                    },
                    success: function(response) {
                        alert('Reserva confirmada con éxito.');
                        location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.status === 401) {
                            window.location.href = '{{ route('login') }}';
                        } else {
                            alert('Error al confirmar la reserva. Inténtalo de nuevo.');
                        }
                    }
                });
            });
        });
    </script>
@endsection
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
