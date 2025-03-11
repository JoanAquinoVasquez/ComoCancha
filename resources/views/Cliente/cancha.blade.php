@extends('Cliente.base')

@section('content')
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
            </div>
        </div>
    </div>

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
