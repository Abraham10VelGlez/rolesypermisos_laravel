<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //creacion de roles
    $ROLE_ADMINISTRADOR = Role::create(['namex' => 'Admini']);
    $ROLE_ADMINISTRADORJR = Role::create(['namex' => 'Adminjr']);
    $ROLE_REVISOR = Role::create(['namex' => 'Revigecem']);
    $ROLE_ESPECIALISTA = Role::create(['namex' => 'Dictaminador']);
    $ROLE_CONTRIBUYENTE = Role::create(['namex' => 'Usergeneral']);
    $ROLE_MUNICIPIO = Role::create(['namex' => 'VisorMun']); // municipios 125
    $ROLE_USEREXTERNO = Role::create(['namex' => 'Extern']); /// fiscalia y recaudacion
    $ROLE_USERINTERNOS = Role::create(['namex' => 'Intern']); /// usuarios extras

    Permission::create(['namex' => 'ROLE_ADMINISTRADOR.adminAvG']);
    //$ROLE_ADMINISTRADOR->givePermissionTo('edit views');

    Permission::create(['namex' => 'Dictaminador.post']);
    

    }
}
