<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_cita');
            $table->time('hora_cita');
            $table->string('nombre_donante');
            $table->string('email_donante');
            $table->string('documento_donante');
            $table->string('n_documento_donante');
            $table->string('telefono_donante');
            $table->date('fecha_nac_donante');
            $table->string('direccion_donante');
            $table->string('estado_civil_donante');
            $table->string('grado_instruccion_donante');
            $table->string('n_documento_paciente');
            $table->string('nombre_paciente');
            $table->string('hospital_paciente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
};
