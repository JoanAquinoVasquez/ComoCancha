@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    <h1></h1>
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
                    <h3 class="text-lg font-semibold mb-4"><i class="fas fa-futbol"></i> Reservas</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 text-right">
                    @role('Administrador')
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal"><i
                                class="fas fa-plus"></i> Agregar</button>
                    @endrole
                </div>
            </div>
        </div>
        <!--Tabla-->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Lista de Reservas</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>IdReserva</th>
                                <th>Fecha</th>
                                <th>Hora Inicio</th>
                                <th>Hora Fin</th>
                                <th>Estado</th>
                                <th>Usuario</th>
                                <th>Cancha</th>
                                @if (!Auth::user()->hasRole('Cliente'))
                                    <th>Opciones</th>
                                @else
                                    <th>Pago</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($reservas as $reserva)
                        <tr class="{{ $reserva->estado == 0 ? 'row-pendiente' : 'row-pagado' }}">
                            <td>{{ $reserva->id }}</td>
                            <td>{{ $reserva->fecha_reserva }}</td>
                            <td>{{ $reserva->hora_inicio }}</td>
                            <td>{{ $reserva->hora_fin }}</td>
                            <td>
                                @if ($reserva->estado == 0)
                                <span>Pendiente</span>
                                @elseif($reserva->estado == 1)
                                <span>Pagado</span>
                                @endif
                            </td>
                            <td>{{ $reserva->user->name }}</td>
                            <td>{{ $reserva->cancha->tipo }}</td>
                            @if (!Auth::user()->hasRole('Cliente'))
                            <td><a href="#" class="btn btn-warning btn-sm me-2">Editar</a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#" data-bs-id="1">Eliminar</button>
                            </td>
                            @elseif ($reserva->estado == 0)
                            <td><button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#paymentModal" data-id="{{ $reserva->id }}">Pagar Ahora</button></td>
                            @elseif($reserva->estado == 1)
                            <td><a class="btn btn-success btn-sm me-2">Pagado</a></td>
                            @endif
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
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
                        <button type="button" class="btn btn-pagar" id="payButton"
                            data-id="{{ $reserva->id }}">Pagar</button>
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


    </div>




@stop


@section('css')

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

        .row-pendiente {
            background-color: #f8d7da; /* Light red */
        }
        .row-pagado {
            background-color: #d4edda; /* Light green */
    </style>
    <!-- Estilos de Bootstrap (puedes ajustar la versión según tu proyecto) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Estilos de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

@stop

@section('js')

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="editModalLabel"><i class="fas fa-plus"></i> Agregar Reserva</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <!-- Cancha, Sede, Código -->
                        <div class="form-row mb-3">
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
                                <label for="sede">Sede</label>
                                <select id="sede" class="form-control">
                                    <option selected>Seleccione...</option>
                                    <option value="1">Sede 1</option>
                                    <option value="2">Sede 2</option>
                                    <option value="3">Sede 3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="codigo">Código</label>
                                <input type="text" class="form-control" id="codigo" placeholder="Código">
                            </div>
                        </div>
                        <!-- Deporte, Fecha -->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="deporte">Deporte</label>
                                <select id="deporte" class="form-control">
                                    <option selected>Seleccione...</option>
                                    <option value="futbol">Fútbol</option>
                                    <option value="basket">Básquet</option>
                                    <option value="tenis">Tenis</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fecha">Fecha</label>
                                <input type="date" class="form-control" id="fecha">
                            </div>
                        </div>
                        <!-- Horario, Cliente -->
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="horario">Horario</label>
                                <select id="horario" class="form-control">
                                    <option selected>Seleccione...</option>
                                    <option value="morning">Mañana</option>
                                    <option value="afternoon">Tarde</option>
                                    <option value="evening">Noche</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cliente">Cliente</label>
                                <select id="cliente" class="form-control">
                                    <option selected>Seleccione...</option>
                                    <option value="cliente1">Cliente 1</option>
                                    <option value="cliente2">Cliente 2</option>
                                    <option value="cliente3">Cliente 3</option>
                                </select>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Cuando se hace clic en el botón "Pagar Ahora"
            $('[data-bs-toggle="modal"]').on('click', function() {
                // Obtén el ID de la reserva desde el botón "Pagar Ahora"
                const reservaId = $(this).data('id');

                // Actualiza el botón "Pagar" en el modal con el ID de la reserva
                $('#payButton').data('id', reservaId);
            });

            // Cuando se hace clic en el botón "Pagar" en el modal
            $('#payButton').on('click', function() {
                // Obtén el ID de la reserva desde el botón "Pagar"
                const reservaId = $(this).data('id');

                // Imprime el ID en la consola
                console.log('ID de la reserva:', reservaId);

                // Aquí puedes agregar la lógica para procesar el pago
            });
        });


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
                    const reservaId = $(this).data('id'); // Obtén el ID de la reserva desde el botón
                    const estado = 1; // Nuevo estado de la reserva

                    $.ajax({
                        url: `{{ route('reservas.update', ':id') }}`.replace(':id',
                            reservaId), // Reemplaza :id con el ID de la reserva
                        method: 'POST',
                        data: {
                            _method: 'POST', // Usa PUT para actualizaciones
                            _token: '{{ csrf_token() }}',
                            estado: estado // Enviamos el nuevo estado
                        },
                        success: function(response) {
                            alert('Reserva Pagada Correctamente');
                            location.reload(); // Recargar la página para reflejar los cambios
                        },
                        error: function(xhr) {
                            if (xhr.status === 401) {
                                window.location.href = '{{ route('login') }}';
                            } else {
                                showMessage(
                                    'Error al actualizar el estado de la reserva. Inténtalo de nuevo.',
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
    </script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

<!-- jQuery (necesario para DataTables) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
@stop
