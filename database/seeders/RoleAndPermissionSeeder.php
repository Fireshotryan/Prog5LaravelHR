<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'index games']);
        Permission::create(['name' => 'show games']);
        Permission::create(['name' => 'create games']);
        Permission::create(['name' => 'edit games']);
        Permission::create(['name' => 'delete games']);
        Permission::create(['name' => 'index writers']);
        Permission::create(['name' => 'show writers']);
        Permission::create(['name' => 'create writers']);
        Permission::create(['name' => 'edit writers']);
        Permission::create(['name' => 'delete writers']);
        Permission::create(['name' => 'view writers']);
        Permission::create(['name' => 'index users']);
        Permission::create(['name' => 'show users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'view users']);

        $Reader = Role::create(['name' => 'reader'])
        ->givePermissionTo(['index games', 'show games']);

        $Writer = Role::create(['name' => 'writer'])
        ->givePermissionTo(['index games', 'show games', 'create games', 'edit games', 'delete games', 'view writers', 'index writers', 'show writers']);


        $Admin = Role::create(['name' => 'admin'])
        ->givePermissionTo(Permission::all());


    }
}
