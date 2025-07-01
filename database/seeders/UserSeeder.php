<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agent = User::query()->updateOrCreate(['email' => 'agent@agent.com'], [
            'password' => bcrypt('agent'),
            'name' => 'agent',
        ]);
        $agent->assignRole(Role::AGENT);
        $user = User::query()->updateOrCreate(['email' => 'user@user.com'], [
            'password' => bcrypt('user'),
            'name' => 'user',
        ]);
        $user->assignRole(Role::USER);
    }
}
