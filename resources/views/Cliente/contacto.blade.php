@extends('Cliente.base')

@section('content')   
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="container mt-5">
            <div class="row contact rounded-4">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="contact-box">
                        <img src="vendor/adminlte/dist/img/comocannchablanco.png" alt="Logo">
                        <h1 class="text-center text-white">Como<b>Cancha</b></h1>
                        <p class="text-center text-white">Juega donde quieras, cuando quieras</p>
                    </div>
                </div>
                <div class="col-md-6 contact-review">
                    <p>INFORMACIÓN DE CONTACTO</p>
                    <h1>Para más información, no dudes en contactarnos</h1>
                    <div class="contact-form">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="col-form-label">Correo:</label>
                                    <input type="text" class="form-control rounded-pill" placeholder="Tu correo:">
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Teléfono:</label>
                                    <input type="text" class="form-control rounded-pill" placeholder="Tu teléfono">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label">Dirección:</label>
                                    <input type="text" class="form-control rounded-pill" placeholder="Tu dirección">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label">Mensaje:</label>
                                    <textarea class="form-control rounded-4" placeholder="Escríbenos un mensaje..."></textarea>
                                </div>
                            </div>
                            <div class="row py-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-custom rounded-pill">Enviar mensaje</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection