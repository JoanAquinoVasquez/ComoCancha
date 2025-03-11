<?php

namespace App\Http\Controllers;

use App\Models\Cancha;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanchaController extends Controller
{
    public function index()
    {
        $canchas = Cancha::all();
        return response()->json($canchas);
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        $request->validate([
            'tipo' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            //      'user_id' => 'required|exists:user,id',
            'deporte_id' => 'required|exists:deporte,id',
            'sede_id' => 'required|exists:sede,id',
            'estado' => 'required|integer|in:0,1,2,3',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('User not authenticated.');
        }
        $user = Auth::user();

        Cancha::create([
            'tipo' => $request->tipo,
            'direccion' => $request->direccion,
            'descripcion' => $request->descripcion,
            'deporte_id' => $request->deporte_id,
            'sede_id' => $request->sede_id,
            'user_id' => $user->id,
            'estado' => $request->estado ?? 0,
        ]);
        return redirect()->route('miscanchas')->with('success', 'Cancha creada exitosamente.');
    }
    public function show($id)
    {
        $cancha = Cancha::with('precio')->findOrFail($id);
        return response()->json($cancha);
    }

    public function getAvailableHours(Request $request)
    {
        \Log::info($request->all());

        // Validar los datos de la solicitud
        $validated = $request->validate([
            'fecha' => 'required|date',
            'cancha_id' => 'required|integer',
            '_token' => 'required|string',
        ]);

        $fecha = $request->input('fecha');
        $cancha_id = $request->input('cancha_id');

        // Crear un mapa de días de la semana con valores numéricos
        $diasSemanaNumericos = [
            'Domingo' => 0,
            'Lunes' => 1,
            'Martes' => 2,
            'Miércoles' => 3,
            'Jueves' => 4,
            'Viernes' => 5,
            'Sábado' => 6,
        ];

        // Determinar el día de la semana basado en la fecha
        $diaSemana = Carbon::parse($fecha)->dayOfWeek;

        // Obtener la cancha y sus horarios
        $cancha = Cancha::with('horarios', 'reservas')->findOrFail($cancha_id);
        $horasDisponibles = [];
        $reservas = $cancha->reservas()->whereDate('fecha_reserva', $fecha)->get(); // Filtrar reservas para la fecha específica

        foreach ($cancha->horarios as $horario) {
            // Convertir el nombre del día en número usando una estructura switch
            switch ($horario->dia) {
                case 'Domingo':
                    $diaHorario = 0;
                    break;
                case 'Lunes':
                    $diaHorario = 1;
                    break;
                case 'Martes':
                    $diaHorario = 2;
                    break;
                case 'Miercoles':
                    $diaHorario = 3;
                    break;
                case 'Jueves':
                    $diaHorario = 4;
                    break;
                case 'Viernes':
                    $diaHorario = 5;
                    break;
                case 'Sabado':
                    $diaHorario = 6;
                    break;
                default:
                    $diaHorario = null;
                    break;
            }

            if ($diaHorario === null) {
                continue; // Si el día en $horario->dia no está en el mapa, saltar al siguiente
            }

            if ($diaHorario == $diaSemana) {
                // Extraer solo la parte de la hora (sin fecha) usando Carbon::parse
                $horaInicio = Carbon::parse($horario->hora_inicio)->format('H:i:s');
                $horaFin = Carbon::parse($horario->hora_fin)->format('H:i:s');

                // Convertir a objetos Carbon para manipulación
                $horaInicioCarbon = Carbon::createFromFormat('H:i:s', $horaInicio);
                $horaFinCarbon = Carbon::createFromFormat('H:i:s', $horaFin);

                // Generar todas las horas en el rango de 1 hora
                $horas = [];
                $hora = $horaInicioCarbon->copy();

                while ($hora->lt($horaFinCarbon)) {
                    $horas[] = $hora->format('H:i:s');

                    $hora->addHour();

                }

                // Tomar solo los últimos 8 valores
                $horasDisponibles = array_slice($horas, -8);

                // Verificar si estas horas están ocupadas por alguna reserva
                foreach ($horasDisponibles as $key => $horaDisponible) {
                    $horaDisponibleCarbon = Carbon::createFromFormat('H:i:s', $horaDisponible);
                    $horaFinDisponibleCarbon = $horaDisponibleCarbon->copy()->addHour();
                    $rangoOcupado = false;
                    foreach ($reservas as $reserva) {
                        $horaReservaInicio = Carbon::createFromFormat('H:i:s', $reserva->hora_inicio);
                        $horaReservaFin = Carbon::createFromFormat('H:i:s', $reserva->hora_fin);

                        if ($horaDisponibleCarbon->lt($horaReservaFin) && $horaFinDisponibleCarbon->gt($horaReservaInicio)) {
                            $rangoOcupado = true;
                            break;
                        }
                    }

                    if ($rangoOcupado) {
                        unset($horasDisponibles[$key]);
                    }
                }
            }
        }
        // Devolver horas disponibles
        return response()->json(['horas' => array_map(function ($hora) {
            return ['value' => $hora, 'label' => $hora];
        }, $horasDisponibles)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'deporte_id' => 'required|exists:deporte,id',
            'sede_id' => 'required|exists:sede,id',
            'estado' => 'required|integer|in:0,1,2,3',
        ]);

        $cancha = Cancha::findOrFail($id);
        $cancha->update($request->all());
        return redirect()->route('miscanchas')->with('success', 'Cancha actualizada exitosamente.');

//        return response()->json($cancha);
    }

    public function destroy($id)
    {
        $cancha = Cancha::findOrFail($id);
        // Elimina todos los horarios relacionados a esta cancha
        $cancha->horarios()->delete();
        $cancha->delete();
        return redirect()->route('miscanchas')->with('success', 'Cancha eliminada exitosamente.');

//        return response()->json(null, 204);
    }
}
