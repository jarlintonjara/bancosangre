<?php

namespace Database\Seeders;

use App\Models\Paciente;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paciente::create([
            'nombre' => 'John',
            'apellido' => 'Doe',
            'fecha_nacimiento' => '1990-01-01',
            'dni' => '12345678',
            'direccion' => 'Calle Principal 123',
        ]);
    }
}
