<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
=======

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Estilos de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
<<<<<<< HEAD

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Link hoja de estilo -->
     <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body>
    <!--<div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
        <img src="public/vendor/adminlte/dist/img/AdminLTELogo.png" class="img-circle animation__shake" alt="AdminLTE Preloader Image" width="60" height="60" style="animation-iteration-count: infinite; display: none;">
    </div>-->
    <!--nav Inicio-->
    <nav class="navbar navbar-expand-lg" style="background-color: #008149;">
        <a class="navbar-brand text-white" href="#">
            <!-- Logo de imagen -->
            <img src="vendor/adminlte/dist/img/comocannchablanco.png" style="height:40px; width:auto" alt="Logo">
            <!-- Texto del enlace -->
            Como<b>Cancha</b>
        </a>       
        <button class="navbar-toggler navbar-light bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
=======
    <!-- Añadir los estilos de jQuery UI Datepicker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>
    <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
        <img src="{{ asset('img/comocannchablanco.png') }}" class="img-circle animation__shake"
            alt="AdminLTE Preloader Image" width="60" height="60"
            style="animation-iteration-count: infinite; display: none;">
    </div>
    <!--nav Inicio-->

    <nav class="navbar navbar-expand-lg" style="background-color: #008149;">
        <a class="navbar-brand text-white" href="#">
            <!-- Logo de imagen -->
            <img src="{{ asset('img/comocannchablanco.png') }}" style="height:40px; width:auto" alt="Logo">
            <!-- Texto del enlace -->
            Como<b>Cancha</b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
<<<<<<< HEAD
            
            <!-- Sección Links Navbar  -->

            <div class="mx-auto">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('Cliente.inicio')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('Cliente.nosotros')}}">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('Cliente.cancha')}}">Canchas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('Cliente.contacto')}}">Contacto</a>
                    </li>
                </ul>
            </div>

            <!-- Sección User Navbar  -->

            <div class="ml auto">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown no-arrow mx-1">

                        <a class="nav-link dropdown-toggle text-white" href="#" id="alertsDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
=======
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="{{ route('Cliente.inicio') }}">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('Cliente.nosotros') }}">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('Cliente.contacto') }}">Contacto</a>
                </li>
            </ul>

            @auth

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
<<<<<<< HEAD

                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="alertsDropdown">
=======
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="bi bi-bell-fill text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
<<<<<<< HEAD
=======

>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert:.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>
<<<<<<< HEAD
        
                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="messagesDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
=======

                    <!-- Nav Item - Messages -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="messagesDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                            <i class="fas fa-envelope fa-fw"></i>
                            <!-- Counter - Messages -->
                            <span class="badge badge-danger badge-counter">7</span>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
<<<<<<< HEAD
                             aria-labelledby="messagesDropdown">
=======
                            aria-labelledby="messagesDropdown">
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                            <h6 class="dropdown-header">
                                Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
<<<<<<< HEAD
                                    <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                         alt="...">
=======
                                    <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">Hi there! I am wondering</div>
                                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
<<<<<<< HEAD
                                    <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                         alt="...">
=======
                                    <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                                    <div class="status-indicator"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">I have the photos</div>
                                    <div class="small text-gray-500">Jae Chun · 1d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
<<<<<<< HEAD
                                    <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                         alt="...">
=======
                                    <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                                    <div class="status-indicator bg-warning"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Last month's repor</div>
                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
<<<<<<< HEAD
                                         alt="...">
=======
                                        alt="...">
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div>
                                    <div class="text-truncate">Am I a good boy?</div>
                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>
<<<<<<< HEAD
        
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                            <img class="img-profile rounded-circle user-image img-circle elevation-2" style="height: 28px; width:auto"
                                 src="https://picsum.photos/300/300">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
=======

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle user-image img-circle elevation-2"
                                style="height: 28px; width:auto" src="https://picsum.photos/300/300">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                @if(auth()->user()->hasRole('Cliente'))
                                Mis reservas
                                @else
                                Dashboard
                                @endif
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="user/profile">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Editar Perfil
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
<<<<<<< HEAD
                  </ul>  
            </div>
        </div>
    </nav>
    <!--nav final-->
    <div class="content">
        @yield('content')
    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1 text-white">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary text-white">© 2024 Company, Inc</span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary text-white" href="#"><i class="fab fa-tiktok" width="24" height="24"></i></a></li>
            <li class="ms-3"><a class="text-body-secondary text-white" href="#"><i class="fab fa-instagram" width="24" height="24"></i></a></li>
            <li class="ms-3"><a class="text-body-secondary text-white" href="#"><i class="fab fa-facebook-f" width="24" height="24"></i></a></li>
        </ul>
    </footer>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
           <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
           <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
    </div>
</div>
</div>
<!-- jQuery (necesario para DataTables) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

<!-- Link js -->
<script src="{{asset('js/script.js')}}"></script>
</body>

</html>
=======
                </ul>
            @endauth
            <!-- Si el usuario no está autenticado -->
            @guest

                <div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a href="{{ route('login') }}" class="nav-link  text-white">Iniciar sesión</a>
                        </li>
                        <li class="nav-item dropdown no-arrow">
                            <a href="{{ route('register') }}" class="nav-link text-white">Registrarse</a>
                        </li>
                    </ul>
                </div>
            @endguest

        </div>
    </nav>
    <!--nav final-->

    @yield('content')
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top"
        style="background-color: #034833;">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1 text-white">
                <svg class="bi" width="30" height="24">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary text-white">© 2024 Company, Inc</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary text-white" href="#"><i class="fab fa-tiktok"
                        width="24" height="24">
                        <use xlink:href="#twitter"></use>
                    </i></a></li>
            <li class="ms-3"><a class="text-body-secondary text-white" href="#"><i class="fab fa-instagram"
                        width="24" height="24">
                        <use xlink:href="#instagram"></use>
                    </i></a></li>
            <li class="ms-3"><a class="text-body-secondary text-white" href="#"><i class="fab fa-facebook-f"
                        width="24" height="24">
                        <use xlink:href="#facebook"></use>
                    </i></a></li>
        </ul>
    </footer>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (necesario para DataTables) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>


    {{-- Canchas --}}
    <script>
        $(document).ready(function() {
            $('#datepicker').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                autoclose: true,
                todayHighlight: true
            }).on('change', function() {
                var selectedDate = $(this).val();
                var canchaId = $('#cancha_select').val();

                $.ajax({
                    url: '/get-available-hours',
                    method: 'POST',
                    data: {
                        dia: selectedDate,
                        cancha_id: canchaId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        var select = $('#hour_select');
                        select.empty();

                        if (data.length > 0) {
                            $.each(data, function(index, hour) {
                                select.append('<option value="' + hour + '">' + hour +
                                    '</option>');
                            });
                        } else {
                            select.append('<option value="">No hay horas disponibles</option>');
                        }
                    }
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Luego jQuery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>

</html>
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
