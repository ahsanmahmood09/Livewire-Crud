<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createAdminUser();
        $this->createNonAdminUser();
    }

    /**
     * @return void
     */
    private function createAdminUser()
    {
        $user = User::factory()->verified()->create([
            'email' => 'admin@solidarity.co.za',
            'password' => Hash::make('12345678'),
        ]);

        $this->assignUserRole($user, config('role_names.admin'));
    }

    /**
     * @return void
     */
    private function createNonAdminUser()
    {
        $nonAdminUsers = User::factory()->verified()->times(5)->create([
            'password' => Hash::make('12345678'),
        ]);

        foreach ($nonAdminUsers as $user)
        {
            $this->assignUserRole($user, config('role_names.non_admins'));

            // assign interests to Users
            $user->interests()->sync(array_rand([
                '1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18'
            ],4));
        }
    }

    /**
     * @param User $user
     * @param string $roleName
     * @return void
     */
    private function assignUserRole(User $user, string $roleName)
    {
        $user->assignRole($roleName);
    }
}
