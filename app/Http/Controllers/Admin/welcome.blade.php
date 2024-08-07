<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gerencia Estratégica</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Elimina el padding de las columnas para que la imagen llegue a los bordes */
        .no-padding {
            padding-left: 0;
            padding-right: 0;
        }

        /* Asegúrate de que la imagen de fondo cubra toda el área disponible */
        .full-width-img {
            width: 100%;
            height: 100vh;
            /* Utiliza el 100% de la altura de la pantalla */
            object-fit: cover;
            /* Cubre el área sin perder las proporciones */
        }

        /* Estilos para la columna de los botones y la imagen pequeña */
        .sidebar {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Centra los elementos verticalmente */
            align-items: center;
            /* Centra los elementos horizontalmente */
        }

        /* Ajustes para el botón y los enlaces */
        .btn-main {
            width: 100%;
            /* Hace que el botón ocupe todo el ancho de la columna */
            margin-bottom: 1rem;
            /* Añade un margen en la parte inferior */
        }

        .btn-custom {
            width: 600px;
        }
    </style>
</head>

<body>
    <div class="container-fluid row no-gutters no-padding">
        <div class="row no-gutters">

            <!-- Columna para la imagen grande -->
            <div class="col-md-7 no-padding">
                <img src="img/epg.jpg" alt="Imagen Grande" class="full-width-img">
            </div>


            <!-- Columna para botones e imagen pequeña -->
            <div class="col-md-5 sidebar">

                <div>
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                                <a href="{{ url('/dashboard') }}">Gestionar Inscripciones</a>
                            @else
                                <a href="{{ route('login') }}">Iniciar Sesión</a>
                            @endauth
                        </div>
                    @endif
                </div>
                <img src="img/epglogo.png" alt="Imagen Pequeña" class="img-fluid mt-2">
                <!-- Imagen pequeña (logo u otra imagen) -->

            </div>

        </div>
    </div>
    <!--
        <div class="container">
            <div class="row justify-content-center mt-5">
            <div class="col-md-8 botones text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-maestria">Maestrias</button>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".modal-doctorado">Doctorados</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target=".modal-segundaEspecialidad">Segunda Especialidad</button>
            </div>
            </div>
        </div> -->






    <!-- Modal - Formulario para Segunda Especialidad -->


    <!--<select id="facultad">
            <option value="ingenieria">Ingeniería</option>
            <option value="ciencias">Ciencias</option>
            <option value="humanidades">Humanidades</option>
        </select>-->

    <!--<select id="programas">
            Opciones se agregarán dinámicamente aquí
        </select>-->
</body>


<!-- Enlaces a JavaScript de Bootstrap y dependencias -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // Función para mostrar una alerta con SweetAlert2
    function mostrarAlerta(mensaje, tipo) {
        Swal.fire({
            title: 'Alerta',
            text: mensaje,
            icon: tipo,
            confirmButtonText: 'Aceptar'
        });
    }
</script>

</html>
