<?php

declare(strict_types=1);

use Domains\Author\Projections\Author;
use Domains\Book\Projections\Book;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

/**
 * BookControllerTest
 */
class BookControllerTest extends TestCase
{
    /**
     * test_it_can_get_books_list_api
     */
    public function test_it_can_get_books_list_api(): void
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
     * test_it_can_get_specific_book_api
     */
    public function test_it_can_get_specific_book_api(): void
    {
        $book = Book::factory()->create();
        $response = $this->getJson('/api/v1/books/1');
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

    /**
     * test_it_can_get_specific_book_with_authors_api
     */
    public function test_it_can_get_specific_book_with_authors_api(): void
    {
        $book = Book::factory()->hasAttached(Author::factory()->count(1))->create();
        $author = $book->authors()->first();
        $response = $this->getJson('/api/v1/books/1?include=authors');
        $response->assertOk();

        $response->assertJson(function (AssertableJson $json) use ($book, $author) {
            $json
                ->has('data')
                ->where('data.attributes.name', $book->name)
                ->where('data.attributes.description', $book->description)
                ->where('data.attributes.status', $book->status)
                ->has('included')
                ->where('included.0.attributes.name', $author->name)
                ->where('included.0.attributes.description', $author->description)
                ->where('included.0.attributes.email', $author->email)
                ->where('included.0.attributes.date_of_birth', $author->date_of_birth)
                ->where('included.0.attributes.contact_number', $author->contact_number)
                ->where('included.0.attributes.address', $author->address)
                ->etc();
        });
    }
}
