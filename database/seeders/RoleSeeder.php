<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agent_role = Role::query()->updateOrCreate(['name' => Role::AGENT]);
        $user_role = Role::query()->updateOrCreate(['name' => Role::USER]);

        $agent_role->givePermissionTo(
            Permission::SHOW_TICKET,
            Permission::SHOW_DOCUMENT,
            Permission::STORE_TICKET_NOTIFICATION,
        );
        $user_role->givePermissionTo(
            Permission::STORE_TICKET,
            Permission::STORE_TICKET_DOCUMENT,
            Permission::SHOW_TICKET,
        );
    }
}
