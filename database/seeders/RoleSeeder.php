<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('role_names') as $item) {
            Role::firstOrCreate([
                'name'       => $item,
                'guard_name' => 'web',
            ]);
        }
    }
}
