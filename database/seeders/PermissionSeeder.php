<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            Permission::STORE_TICKET,
            Permission::STORE_TICKET_DOCUMENT,
            Permission::SHOW_TICKET,
        ];

        foreach ($permissions as $permission) {
            Permission::query()->updateOrCreate(['name' => $permission]);
        }
    }
}
