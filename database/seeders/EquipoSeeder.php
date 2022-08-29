<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\TipoEquipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Equipo::create([
            'tipoequipo_id' => 1,
            'Nombre' => 'GFS',
            'status' => 1
        ]);
        Equipo::create([
            'tipoequipo_id' => 1,
            'Nombre' => 'EUROPEO - EPS GRAMA - ASUNCION',
            'status' => 1

        ]);    
        Equipo::create([
            'tipoequipo_id' => 1,
            'Nombre' => 'ETA - CPTEC',
            'status' => 1
        ]);
        Equipo::create([
            'tipoequipo_id' => 2,
            'Nombre' => 'PCGIDDOS',
            'status' => 1
        ]);
        Equipo::create([
            'tipoequipo_id' => 2,
            'Nombre' => 'ZYGRIB',
            'status' => 1
        ]);
        Equipo::create([
            'tipoequipo_id' => 2,
            'Nombre' => 'ACTUALIZADOR DE PRONOSTICOS',
            'status' => 1
        ]);
        Equipo::create([
            'tipoequipo_id' => 3,
            'Nombre' => 'DATOS SINOP DE PARAGUAY',
            'status'=>1
        ]);
        Equipo::create([
            'tipoequipo_id' => 3,
            'Nombre' => 'ACCESO A DATOS',
            'status'=>1
        ]);
        Equipo::create([
            'tipoequipo_id' => 3,
            'Nombre' => 'DATOS SINOP DE SUDAMERICA',
            'status'=>1
        ]);
        Equipo::create([
            'tipoequipo_id' => 4,
            'Nombre' => 'PRODUCTOS DE RADAR',
            'status'=>1
        ]);
        Equipo::create([
            'tipoequipo_id' => 4,
            'Nombre' => 'DETECTOR DE RAYOS',
            'status'=>1
        ]);
        Equipo::create([
            'tipoequipo_id' => 5,
            'Nombre' => 'ACTUALIZACION DE BOLETIN MET. DIARIO',
            'status'=>1
        ]);
        Equipo::create([
            'tipoequipo_id' => 5,
            'Nombre' => 'ENVIO DE BOLETIN DIARIO POR CORREO',
            'status'=>1
        ]);
        Equipo::create([
            'tipoequipo_id' => 5,
            'Nombre' => 'ANALISIS DE LACARTA SUPERCINE',
            'status'=>1
        ]);
        Equipo::create([
            'tipoequipo_id' => 6,
            'Nombre' => 'IMAGENES DELGOES',
            'status'=>1
        ]);
        Equipo::create([
            'tipoequipo_id' => 6,
            'Nombre' => 'IMAGENES DEL EUMETSAT',
            'status'=>1
        ]);
        Equipo::create([
            'tipoequipo_id' => 7,
            'Nombre' => 'TELEFONO CELULAR PARA ALERTAS',
            'status'=>1
        ]);
        Equipo::create([
            'tipoequipo_id' => 7,
            'Nombre' => 'VIDEO CONFERENCIA',
            'status'=>1
        ]);
        Equipo::create([
            'tipoequipo_id' => 8,
            'Nombre' => 'ALERTAS',
            'status'=>1
        ]);
        Equipo::create([
            'tipoequipo_id' => 8,
            'Nombre' => 'BOLETIN ESPECIAL',
            'status'=>1
        ]);


    }
}
