<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id(); // This creates an auto_increment primary key column named `id`
            $table->string('nombre_completo', 255);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 255);
            $table->enum('genero', ['Masculino', 'Femenino']); // Definir los valores permitidos
            $table->timestamps(); // This creates `created_at` and `updated_at` columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
