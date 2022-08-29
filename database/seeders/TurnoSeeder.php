<?php

namespace Database\Seeders;

use App\Models\Turno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Turno::create([
            'Descripcion' => 'MADRUGADA (00:00 a 06:00)',
            'status'=>1
        ]);
        Turno::create([
            'Descripcion' => 'MAÑANA (06:00 a 12:00)',
            'status'=>1
        ]);
        Turno::create([
            'Descripcion' => 'TARDE (12:00 a 18:00)',
            'status'=>1
        ]);
        Turno::create([
            'Descripcion' => 'NOCHE (18:00 a 00:00)',
            'status'=>1
        ]);
        Turno::create([
            'Descripcion' => 'OTROS (24 horas)',
            'status'=>1
        ]);
    }
}
