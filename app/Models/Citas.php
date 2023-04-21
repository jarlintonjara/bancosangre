<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_cita',
        'hora_cita',
        'nombre_donante',
        'email_donante',
        'documento_donante',
        'n_documento_donante',
        'telefono_donante',
        'fecha_nac_donante',
        'direccion_donante',
        'estado_civil_donante',
        'grado_instruccion_donante',
        'n_documento_paciente',
        'nombre_paciente',
        'hospital_paciente',
    ];
}
