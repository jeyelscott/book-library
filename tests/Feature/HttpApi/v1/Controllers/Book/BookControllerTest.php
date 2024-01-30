<?php

declare(strict_types=1);

use Domains\Book\Models\Book;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

/**
 * BookControllerTest
 */
class BookControllerTest extends TestCase
{
    /**
     * test_it_can_get_books_list
     */
    public function test_it_can_get_books_list(): void
    {
        Book::factory(10)->create();

        $book = Book::first();

        $response = $this->getJson('/api/v1/books');

        $response->assertOk();

        $response->assertJson(function (AssertableJson $json) use ($book) {
            $json
                ->has('data')
                ->has('data.0')
                ->count('data', 10)
                ->where('data.0.attributes.name', $book->name)
                ->where('data.0.attributes.description', $book->description)
                ->where('data.0.attributes.status', $book->status)
                ->etc();
        });
    }

    /**
     * test_it_can_get_specific_book
     */
    public function test_it_can_get_specific_book(): void
    {
        $book = Book::factory()->create();
        $response = $this->getJson('/api/v1/books/24');
        $response->assertOk();

        $response->assertJson(function (AssertableJson $json) use ($book) {
            $json
                ->has('data')
                ->where('data.attributes.name', $book->name)
                ->where('data.attributes.description', $book->description)
                ->where('data.attributes.status', $book->status)
                ->etc();
        });
    }
}
