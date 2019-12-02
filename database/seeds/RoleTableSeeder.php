<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $role = new Role();
        $role->name = 'system';
        $role->description = 'Usuario administrador de aplicacion';
        $role->save();

        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Usuario administrador del sistema';
        $role->save();

        $role = new Role();
        $role->name = 'catalogo';
        $role->description = 'Usuario administrador del catalogos';
        $role->save();

        $role = new Role();
        $role->name = 'ciudadano';
        $role->description = 'Ciudadano';
        $role->save();

        $role = new Role();
        $role->name = 'autentificado';
        $role->description = 'Usuario autentificado para el levantamiento de fugas visibles';
        $role->save();

        $role = new Role();
        $role->name = 'verificador';
        $role->description = 'Usuario para la verificador de reporte de fugas visibles';
        $role->save();

        $role = new Role();
        $role->name = '';
        $role->description = 'Usuario autentificado para el levantamiento';
        $role->save();

        $role = new Role();
        $role->name = 'general';
        $role->description = 'Usuario supervidor global';
        $role->save();


        $role = new Role();
        $role->name = 'regional';
        $role->description = 'Usuario coordinador regional';
        $role->save();

        $role = new Role();
        $role->name = 'lider';
        $role->description = 'Usuario lider de cuadrilla';
        $role->save();

        $role = new Role();
        $role->name = 'novisible';
        $role->description = 'Usuario para registro de fugas no  visible';
        $role->save();

    }
}
