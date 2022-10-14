<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'asesorTelefonico']);
        $role3 = Role::create(['name' => 'asesorComercial']);

        Permission::create(['name' => 'inicio'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]); 
        Permission::create(['name' => 'users.update'])->syncRoles([$role1]); 
        Permission::create(['name' => 'users.ofertas'])->syncRoles([$role1]); 

        Permission::create(['name' => 'crear.cliente'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'borrar.cliente'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar.cliente'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'actualizar.cliente'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'borrar.cita'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'ver.citas.cliente'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'crear.cita'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'ver.propiedades.cliente'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'borrar.propiedad'])->syncRoles([$role1]);
        Permission::create(['name' => 'crear.propiedad'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'editar.propiedad'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'actualizar.propiedad'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'ver.propiedad.asesor'])->syncRoles([$role3]);

        Permission::create(['name' => 'ver.index'])->syncRoles([$role2]);



    }
}
