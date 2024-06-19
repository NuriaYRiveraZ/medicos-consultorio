<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_medico_citas')->constrained('medicos');
            $table->foreignId('id_paciente_citas')->constrained('pacientes');
            $table->foreignId('id_servicio_citas')->constrained('servicios');
            $table->dateTime('fecha');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
