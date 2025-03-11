<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PostulantesValidadosExport;
use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Provincia;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use App\Models\Postulante;
use App\Models\Programa;
use App\Models\Grado;
use App\Exports\PostulantesExport;
use Maatwebsite\Excel\Facades\Excel;



class HomeController extends Controller
{
    //
    public function index()
    {
        $canchas = Canchas::all();
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.index', compact($canchas));
    }

    public function showDashboard()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.index');
    }
    public function showMisCanchas()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.miscanchas');
    }
    public function showHorarios()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.horarios');
    }
    public function showDeportes()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.deportes');
    }
    public function showSedes()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.sedes');
    }
    public function showReservas()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.reservas');
    }
    public function showClientes()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.clientes');
    }
    public function showUsuarios()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.usuarios');
    }
    public function showServicios()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.servicios');
    }
    public function showSuperficies()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('admin.superficies');
    }
    public function showInicio()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('Cliente.inicio');
    }
    public function showNosotros()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('Cliente.nosotros');
    }

    public function showCancha()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('Cliente.cancha');
    }
    public function showContacto()
    {
        // Devolver la vista 'dashboard' con los datos necesarios
        return view('Cliente.contacto');
    }
}