<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;
use App\Models\User;

class MedicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $usuarioMedico = User::where('tipo', 'doctor')->first(); // Buscar al usuario tipo doctor

        if ($usuarioMedico) {
            Medico::create([
                'nombre' => 'Nuria Rivera',
                'telefono' => '8342886094',
                'profesion' => 'Medico General',
                'tipo' => 'Medico',
                'id_usuario_medicos' => $usuarioMedico->id,
            ]);
        }
    }
}
