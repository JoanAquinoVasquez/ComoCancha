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

}
