<?php

declare(strict_types=1);

use Domains\Author\Projections\Author;
use Domains\Book\Projections\Book;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

/**
 * AuthorControllerTest
 */
class AuthorControllerTest extends TestCase
{
    /**
     * test_it_can_get_authors_list_api
     */
    public function test_it_can_get_authors_list_api(): void
    {
        Author::factory(10)->create();

        $author = Author::first();

        $response = $this->getJson('api/v1/authors');

        $response->assertOk();

        $response->assertJson(function (AssertableJson $json) use ($author) {
            $json
                ->has('data')
                ->has('data.0')
                ->count('data', 10)
                ->where('data.0.attributes.name', $author->name)
                ->where('data.0.attributes.description', $author->description)
                ->where('data.0.attributes.email', $author->email)
                ->where('data.0.attributes.date_of_birth', $author->date_of_birth)
                ->where('data.0.attributes.contact_number', $author->contact_number)
                ->where('data.0.attributes.address', $author->address)
                ->etc();
        });
    }

    /**
     * test_it_can_get_specific_author_api
     */
    public function test_it_can_get_specific_author_api(): void
    {
        $author = Author::factory()->create();
        $response = $this->getJson('/api/v1/authors/1');
        $response->assertOk();

        $response->assertJson(function (AssertableJson $json) use ($author) {
            $json
                ->has('data')
                ->where('data.attributes.name', $author->name)
                ->where('data.attributes.description', $author->description)
                ->where('data.attributes.email', $author->email)
                ->where('data.attributes.date_of_birth', $author->date_of_birth)
                ->where('data.attributes.contact_number', $author->contact_number)
                ->where('data.attributes.address', $author->address)
                ->etc();
        });
    }

    /**
     * test_it_can_get_specific_author_with_books_api
     */
    public function test_it_can_get_specific_author_with_books_api(): void
    {
        $author = Author::factory()->hasAttached(Book::factory()->count(1))->create();
        $book = $author->books()->first();
        $response = $this->getJson('/api/v1/authors/1?include=books');
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
