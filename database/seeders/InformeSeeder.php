<?php

namespace Database\Seeders;

use App\Models\Informe;
use App\Models\Equipo;
use App\Models\Informeable;
use App\Models\Observar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $informes = Informe::factory(35)->create();
        foreach ($informes as $informe) {

            $equipos = Equipo::all();
                foreach($equipos as $equipo){        
                    Informeable::factory(1)->create([
                        'informe_id'=>$informe->id,
                        'equipo_id' => $equipo->id,
                        'tipoequipo_id'=>$equipo->Tipo_equipo->id,
                        'comentario'=> 'Este es el comentario del equipo: ' . $informe->id . 'del equipo nro' . $equipo->id,  
                        
                    ]);         
                }                    
            }    
        }
    }