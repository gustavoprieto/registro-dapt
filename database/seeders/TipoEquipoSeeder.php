<?php

namespace Database\Seeders;

use App\Models\TipoEquipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoEquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            TipoEquipo::create([
                'Descripcion' => 'MODELOS NUMERICOS DISPONIBLES',
                'status'=>1
            ]);
            TipoEquipo::create([
                'Descripcion' => 'PROGRAMAS DE SOPORTE',
                'status'=>1
            ]);
            TipoEquipo::create([
                'Descripcion' => 'DATOS DISPONILES',
                'status'=>1
            ]);
            TipoEquipo::create([
                'Descripcion' => 'SISTEMA DE VIGILANCIA',
                'status'=>1
            ]);
            TipoEquipo::create([
                'Descripcion' => 'TAREAS ESTABLECIDAS',
                'status'=>1
            ]);
            TipoEquipo::create([
                'Descripcion' => 'PRODUCTOS DE LA WEB',
                'status'=>1
            ]);
            TipoEquipo::create([
                'Descripcion' => 'OTROS EQUIPOS',
                'status'=>1
            ]);
            TipoEquipo::create([
                'Descripcion' => 'OTROS BOLETINES EMITIDOS',
                'status'=>1
            ]);
    }
}