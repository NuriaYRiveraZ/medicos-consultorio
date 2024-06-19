<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Patient;

class AgendaController extends Controller
{
    public function create()
    {
        if (auth()->user()->tipo === 'secretaria') {
            $pacientes = Patient::all();
            return view('secretaria.pacientes', compact('pacientes'));
        } elseif (auth()->user()->tipo === 'medico') {
            $pacientes = Patient::all();
            return view('doctor.pacientes', compact('pacientes'));
        }
    }

    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'id_paciente_agenda' => 'required|exists:pacientes,id',
            'fecha' => 'required|date',
            'hora' => 'required|string|max:5',
            'telefono' => 'nullable|string|max:20',
        ]);

        // Crear una nueva agenda con el campo atendida establecido en 0
        Agenda::create([
            'id_paciente_agenda' => $validated['id_paciente_agenda'],
            'fecha' => $validated['fecha'],
            'hora' => $validated['hora'],
            'telefono' => $validated['telefono'],
        ]);

        return redirect()->route('agendas.create')->with('success', 'Cita registrada correctamente');
    }
}
