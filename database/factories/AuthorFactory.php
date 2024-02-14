<?php

declare(strict_types=1);

namespace Database\Factories;

use Domains\Author\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['male', 'female']);

        return [
            'name' => fake()->name($gender),
            'description' => fake()->paragraph(),
            'contact_number' => '9'.rand(100000000, 999999999),
            'email' => fake()->email(),
            'date_of_birth' => fake()->date('Y-m-d', date('Y-m-d', strtotime('-18 years'))),
            'address' => fake()->address(),
        ];
    }
}
