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
        Schema::create('dnis', function (Blueprint $table) {
            $table->id();
            $table->string('DOCUMENTO')->unique();
            $table->string('APE_PATERNO');
            $table->string('APE_MATERNO');
            $table->string('NOMBRES');
            $table->char('SEXO', 1);
            $table->date('FH_NACIMIENTO');
            $table->string('DIRECCION');
            $table->string('UBIGEO', 6);
            $table->string('DEPARTAMENTO');
            $table->string('PROVINCIA');
            $table->string('DISTRITO');
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
        Schema::dropIfExists('dnis');
    }
};
