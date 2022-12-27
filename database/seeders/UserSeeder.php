<?php

namespace Database\Seeders;

use App\Models\Interest;
use App\Models\User;
use Database\Factories\InterestFactory;
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
            'email' => 'Admin@Solidarity.co.za',
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

        $interests = (new InterestFactory())->times(5)->create();
        $interestIds = $interests->map(function (Interest $interest) {
            return $interest->id;
        });

        foreach ($nonAdminUsers as $user)
        {
            $this->assignUserRole($user, config('role_names.non_admins'));

            // assign interests to Users
            $user->interests()->sync($interestIds->toArray());
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
