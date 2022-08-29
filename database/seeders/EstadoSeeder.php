<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'Descripcion' => 'ACTIVO',
            'valor'=> 100,
            'status'=>1
        ]);
        Estado::create([
            'Descripcion' => 'DESACTIVADO',
            'valor'=> 0,
            'status'=>1

        ]);
        Estado::create([
            'Descripcion' => 'EN PRUEBA',
            'valor'=> 50,
            'status'=>1
        ]);
        Estado::create([
            'Descripcion' => 'OTROS',
            'valor'=> 75,
            'status'=>1
        ]);
        
    }
}
