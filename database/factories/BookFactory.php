<?php

declare(strict_types=1);

namespace Database\Factories;

use Domains\Author\Projections\Author;
use Domains\Book\Projections\Book;
use Domains\Genre\Projections\Genre;
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
            'is_featured' => rand(0, 1),
        ];
    }

    /**
     * configure
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Book $book) {
            $authors = Author::inRandomOrder()->limit(rand(1, 3))->get();
            $genres = Genre::inRandomOrder()->limit(rand(1, 3))->get();

            $book->authors()->attach($authors);
            $book->genres()->attach($genres);
        });
    }
}
