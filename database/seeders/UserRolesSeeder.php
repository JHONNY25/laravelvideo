<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'ShowVideo']);
        Permission::create(['name' => 'CreateVideo']);
        Permission::create(['name' => 'DeleteVideo']);
        Permission::create(['name' => 'UpdateVideo']);
        Permission::create(['name' => 'ShowStatistics']);

        $superUserRole = Role::create(['name' => 'superuser']);
        $superUserRole->givePermissionTo(Permission::all());

        $adminRole = Role::create(['name' => 'user']);
        $adminRole->givePermissionTo(['ShowStatistics', 'ShowVideo']);
    }
}
