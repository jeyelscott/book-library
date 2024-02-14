<?php

namespace Database\Factories;

use Domains\Customer\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'gender' => fake()->randomElement(['male', 'female']),
            'date_of_birth' => fake()->date(),
            'address' => fake()->address(),
            'contact_number' => '09' . rand(100000000, 999999999),
            'email' => fake()->email(),
            'password' => Hash::make('password'),
            'email_verified_at' => rand(0, 1) ? now() : null,
            'status' => rand(0, 1),
        ];
    }
}
