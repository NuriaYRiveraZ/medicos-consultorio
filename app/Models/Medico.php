<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'telefono', 'profesion', 'tipo', 'id_usuario_medicos',
    ];

    // Si tienes una tabla con un nombre diferente al convencional, puedes definirla aquí:
    // protected $table = 'nombre_de_tabla';
}
