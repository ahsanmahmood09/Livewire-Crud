<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'surname' => $this->faker->name(),
            'mobile_number' => $this->faker->numberBetween(0, 41415155115),
            'dob' => $this->faker->dateTimeBetween('1999-01-01', '2023-12-31')->format('d/m/Y'),
            'language' => 'Africans',
            'south_african_id' => $this->faker->uuid(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return Factory
     */
    public function unverified(): Factory
    {
        return $this->state(function () {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * @return Factory
     */
    public function verified(): Factory
    {
        return $this->state(function () {
            return [
                'email_verified_at' => now(),
            ];
        });
    }
}
