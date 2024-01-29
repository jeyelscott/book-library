<?php

declare(strict_types=1);

namespace Database\Factories\Domains\Book\Models;

use Domains\Book\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->sentence(),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['borrowed', 'available', 'not-available']),
        ];
    }
}
