<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
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
        $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'sex' => 'required|string|in:Masculino,Femenino',
            'phone' => 'required|string|max:15',
        ]);

        Patient::create([
            'nombre_completo' => $request->name,
            'fecha_nacimiento' => $request->birthdate,
            'genero' => $request->sex,
            'telefono' => $request->phone,
        ]);

        return redirect()->route('patients.create')->with('success', 'Paciente registrado exitosamente.');
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            $patient->delete();
            return redirect()->route('patients.create')->with('success', 'Paciente eliminado exitosamente.');
        }
        return redirect()->route('patients.create')->with('error', 'Paciente no encontrado.');
    }

}

