<?php

namespace App\Http\Controllers;
use App\Models\Agenda;
use App\Models\Patient;
use App\Models\User;

class MenuController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }


    public function agendarCitaS(){
        if (auth()->user()->tipo === 'secretaria') {
            $pacientes = Patient::all();
            return view('secretaria.agendarCitaS', compact('pacientes'));
        }    
    }

    public function index()
    {
        if (auth()->user()->tipo === 'secretaria') {
            $agendas = Agenda::all();
            $pacientes = Patient::all();
            return view('secretaria.dashboard', compact('agendas', 'pacientes'));
        } elseif (auth()->user()->tipo === 'medico') {
            $agendas = Agenda::all();
            $pacientes = Patient::all();
            return view('doctor.dashboard', compact('agendas', 'pacientes'));
        } else {
            return view('dashboard');
        }
    }

    public function pacientes()
    {
        if (auth()->user()->tipo === 'secretaria') {
            $pacientes = Patient::all();
            return view('secretaria.pacientes', compact('pacientes'));
        } elseif (auth()->user()->tipo === 'medico') {
            $pacientes = Patient::all();
            return view('doctor.pacientes', compact('pacientes'));
        } 
    }

    public function productos()
    {
        if (auth()->user()->tipo === 'secretaria') {
            return view('secretaria.productos');
        } elseif (auth()->user()->tipo === 'medico') {
            return view('doctor.productos');
        }
    }

    public function usuarios()
    {
        if (auth()->user()->tipo === 'secretaria') {
            $usuarios = User::all();
            return view('secretaria.usuarios', compact('usuarios'));
        } elseif (auth()->user()->tipo === 'medico') {
            return view('doctor.usuarios');
        }
    }

}
