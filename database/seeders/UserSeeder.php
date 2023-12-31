<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = \App\Models\User::factory()->create();
        $admin = User::find($userAdmin['id']);
        $admin->assignRole('superuser');

        $user = \App\Models\User::factory()->create();
        $admin = User::find($user['id']);
        $admin->assignRole('user');
    }
}
