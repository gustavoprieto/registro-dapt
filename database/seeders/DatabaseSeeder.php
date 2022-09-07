<?php

namespace Database\Seeders;

use App\Models\Equipo;
use App\Models\Estado;
use App\Models\InfoEquipoEstado;
use App\Models\Informe;
use App\Models\Observar;
use App\Models\Permiso;
use App\Models\Rol;
use App\Models\TipoEquipo;
use App\Models\Turno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(RoleSeeder::class);
        $this->call(TipoEquipoSeeder::class);
        $this->call(EquipoSeeder::class);
        $this->call(TurnoSeeder::class);

        $this->call(EstadoSeeder::class);

        
        
       $this->call(UserSeeder::class);
        
    //   $this->call(InformeSeeder::class);

        



        
   
        
    }
}