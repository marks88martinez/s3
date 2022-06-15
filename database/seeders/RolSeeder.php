<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role1 = Role::create([
            'name'=>'Admin'
        ]);
        $role2 = Role::create([
            'name'=>'Company'
        ]);

        Permission::create(['name'=>'home'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'info'])->syncRoles([$role1, $role2]);


        Permission::create(['name'=>'userClient.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'userClient.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'userClient.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'userClient.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'product.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'product.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'product.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'product.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'datosEmpresa.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'datosEmpresa.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'datosEmpresa.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'datosEmpresa.destroy'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'rma.index'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'rma.create'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'rma.edit'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'rma.destroy'])->syncRoles([$role1, $role2]);




    }
}
