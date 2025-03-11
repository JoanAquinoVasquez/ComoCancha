@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-xl sm:rounded-lg p-6">
        <h3 class="text-lg font-semibold mb-4">Bienvenido {{ auth()->user()->name }} a ComoCancha </h3>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
   <!-- Content Row -->
   <div class="row">
<<<<<<< HEAD

=======
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Mis Canchas</div>
<<<<<<< HEAD
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
=======
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCanchas }}</div>
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-futbol fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Horarios de atención</div>
<<<<<<< HEAD
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
=======
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$numHorarios}}</div>
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clock fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Deporte
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                         style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-flag fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Row 1-->
<!-- Content Row 2-->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Mis Sedes</div>
<<<<<<< HEAD
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
=======
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $numSedes }}</div>
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
<<<<<<< HEAD
                            Superficies</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
=======
                            Reservas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $numReservas }}</div>
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-ruler-vertical fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Servicios
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                         style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Row 2-->
<!-- Content Row 3-->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
<<<<<<< HEAD
                            Usuarios</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
=======
                            Ganancia</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalGanancias }}</div>
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Clientes</div>
<<<<<<< HEAD
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
=======
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalClientes }}</div>
>>>>>>> eb758ae0447cfcba8018a944f9e05cb22e5670f0
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-shield fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Reservas
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                         style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                         aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fa fa-ticket-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Row 3-->
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