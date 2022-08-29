<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\RolUsuarioFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
//    use HasRoles;
   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $usuario1 = User::create([
           'name' => 'Gustavo',
           'email' => 'gustavo.prieto@meteorologia.gov.py',
            'email_verified_at' => '2022-06-20 13:11:18',
           'password' => bcrypt('Dinacginf321'),
           'status'=>1,
           'remember_token' => '4aGuEhfj7x'
       ]);
       $usuario1->assignRole('ADMINISTRADOR');
       $usuario2 = User::create([
           'name' => 'Wilson',
           'email' => 'wilson.caballero@meteorologia.gov.py',
            'email_verified_at' => '2022-06-20 13:11:18',
           'password' => bcrypt('Dinacginf321'),
           'status'=>1,
           'remember_token' => '4aGuEhfj7x'
       ]);
       $usuario2->assignRole('ADMINISTRADOR');
       $usuario3 = User::create([
           'name' => 'Mavi',
           'email' => 'mavi.recalde@meteorologia.gov.py',
            'email_verified_at' => '2022-06-20 13:11:18',
           'password' => bcrypt('Dinacginf321'),
           'status'=>1,
           'remember_token' => '4aGuEhfj7x'
       ]);
        $usuario3->assignRole('ADMINISTRADOR');

    //    $role = Role::where('name', 'Administrador')->first();
       
        User::factory(10)->create();

        // $usuarios = User::all();
        // foreach ($usuarios as $usuario) {
        //     $usuario->roles()->attach([
        //         rand(1,1),
        //         rand(2,2),
        //         rand(3,3),
        //         rand(4,4)
        //     ]);
        // }
    }
}