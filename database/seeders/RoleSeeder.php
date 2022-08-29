<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role1 = Role::create(['name'=>'ADMINISTRADOR']);
       $role2 = Role::create(['name'=>'SUPERVISOR']);
       $role3 = Role::create(['name' =>'PRONOSTICADOR']);

       //Permission::create(['name'=>'admin.home', 'descripcion'=>'Ver todos los informes'])->syncRoles([$role1, $role2, $role3]);
       Permission::create(['name'=>'informe.index', 'descripcion'=>'Ver informes todos los informes'])->syncRoles([$role1, $role2, $role3]);
       Permission::create(['name'=>'informe.show', 'descripcion'=>'Mostrar detalle del informe'])->syncRoles([$role1, $role2, $role3]);       
       Permission::create(['name'=>'admin.informes.buscar', 'descripcion'=>'Buscar informes'])->syncRoles([$role1, $role2, $role3]); 
       
       
       //Permission::create(['name'=>'admin.informes.index', 'descripcion'=>'Ver tos los informes'])->syncRoles([$role1, $role2, $role3]);
       Permission::create(['name'=>'admin.informes.create', 'descripcion'=>'Crear informe'])->syncRoles([$role1, $role2, $role3]);       
       Permission::create(['name'=>'admin.informes.edit', 'descripcion'=>'Modificar informe'])->syncRoles([$role1, $role2, $role3]);
       Permission::create(['name'=>'admin.informes.destroy', 'descripcion'=>'Eliminar informe'])->syncRoles([$role1, $role2, $role3]);
       Permission::create(['name'=>'informe.imprimir', 'descripcion'=>'Imprimir/descargar informe'])->syncRoles([$role1, $role2, $role3]);
       
       
       //Permission::create(['name'=>'admin.informes.indexbusca', 'descripcion'=>'Buscar informes'])->syncRoles([$role1, $role2, $role3]);

       
       Permission::create(['name'=>'admin.users.index', 'descripcion'=>'Ver listado de usuarios'])->syncRoles([$role1, $role2]);
       Permission::create(['name'=>'admin.users.create', 'descripcion'=>'Crear usuario'])->syncRoles([$role1]);       
       Permission::create(['name'=>'admin.users.edit', 'descripcion'=>'Modificar datos de usuario'])->syncRoles([$role1]);
       Permission::create(['name'=>'admin.users.destroy', 'descripcion'=>'Eliminar usuario'])->syncRoles([$role1]);

       Permission::create(['name'=>'admin.turnos.index', 'descripcion'=>'Ver listado de turnos'])->syncRoles([$role1, $role2]);
       Permission::create(['name'=>'admin.turnos.create', 'descripcion'=>'Crear turnos'])->syncRoles([$role1]);       
       Permission::create(['name'=>'admin.turnos.edit', 'descripcion'=>'Modificar turnos'])->syncRoles([$role1]);
       Permission::create(['name'=>'admin.turnos.destroy', 'descripcion'=>'Eliminar turnos'])->syncRoles([$role1]);

       Permission::create(['name'=>'admin.estados.index', 'descripcion'=>'Ver listado de estados'])->syncRoles([$role1, $role2]);
       Permission::create(['name'=>'admin.estados.create', 'descripcion'=>'Crear estados'])->syncRoles([$role1]);       
       Permission::create(['name'=>'admin.estados.edit', 'descripcion'=>'Modificar estados'])->syncRoles([$role1]);
       Permission::create(['name'=>'admin.estados.destroy', 'descripcion'=>'Eliminar estados'])->syncRoles([$role1]);

       Permission::create(['name'=>'admin.equipos.index', 'descripcion'=>'Ver listado de equipos'])->syncRoles([$role1, $role2]);
       Permission::create(['name'=>'admin.equipos.create', 'descripcion'=>'Crear datos del equipo'])->syncRoles([$role1]);       
       Permission::create(['name'=>'admin.equipos.edit', 'descripcion'=>'Modificar datos del equipo'])->syncRoles([$role1]);
       Permission::create(['name'=>'admin.equipos.destroy', 'descripcion'=>'Eliminar equipos'])->syncRoles([$role1]);

       Permission::create(['name'=>'admin.tipoequipos.index', 'descripcion'=>'Ver listado de Grupos de equipos'])->syncRoles([$role1, $role2]);
       Permission::create(['name'=>'admin.tipoequipos.create', 'descripcion'=>'Crear grupos'])->syncRoles([$role1]);       
       Permission::create(['name'=>'admin.tipoequipos.edit', 'descripcion'=>'Modificar grupo'])->syncRoles([$role1]);
       Permission::create(['name'=>'admin.tipoequipos.destroy', 'descripcion'=>'Eliminar grupo'])->syncRoles([$role1]);


       Permission::create(['name'=>'admin.roles.index', 'descripcion'=>'Ver listado de roles'])->syncRoles([$role1]);
       Permission::create(['name'=>'admin.roles.create', 'descripcion'=>'Crear roles'])->syncRoles([$role1]);       
       Permission::create(['name'=>'admin.roles.edit', 'descripcion'=>'Modificar roles'])->syncRoles([$role1]);
       Permission::create(['name'=>'admin.roles.show', 'descripcion'=>'Mostrar detalle de Role'])->syncRoles([$role1]);
       Permission::create(['name'=>'admin.roles.destroy', 'descripcion'=>'Eliminar rol'])->syncRoles([$role1]);

      
    }
}