<?php

declare(strict_types=1);

use Domains\Book\Projections\Book;
use Domains\Genre\Projections\Genre;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

/**
 * GenreControllerTest
 */
class GenreControllerTest extends TestCase
{
    /**
     * test_it_can_get_genres_list_api
     */
    public function test_it_can_get_genres_list_api(): void
    {
        Genre::factory(10)->create();

        $genre = Genre::first();

        $response = $this->getJson('/api/v1/genres');

        $response->assertOk();

        $response->assertJson(function (AssertableJson $json) use ($genre) {
            $json
                ->has('data')
                ->has('data.0')
                ->count('data', 10)
                ->where('data.0.attributes.name', $genre->name)
                ->where('data.0.attributes.description', $genre->description)
                ->etc();
        });
    }

    /**
     * test_it_can_get_specific_genre_api
     */
    public function test_it_can_get_specific_genre_api(): void
    {
        $genre = Genre::factory()->create();
        $response = $this->getJson('/api/v1/genres/1');
        $response->assertOk();

        $response->assertJson(function (AssertableJson $json) use ($genre) {
            $json
                ->has('data')
                ->where('data.attributes.name', $genre->name)
                ->where('data.attributes.description', $genre->description)
                ->etc();
        });
    }

    /**
     * test_it_can_get_specific_genre_with_books_api
     */
    public function test_it_can_get_specific_genre_with_books_api(): void
    {
        $genre = Genre::factory()->hasAttached(Book::factory()->count(1))->create();
        $book = $genre->books()->first();
        $response = $this->getJson('/api/v1/genres/1?include=books');
        $response->assertOk();

        $response->assertJson(function (AssertableJson $json) use ($book) {
            $json
                ->has('included')
                ->where('included.0.attributes.name', $book->name)
                ->where('included.0.attributes.description', $book->description)
                ->where('included.0.attributes.status', $book->status)
                ->where('included.0.attributes.is_featured', $book->is_featured)
                ->etc();
        });
    }
}
