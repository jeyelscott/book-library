<?php

declare(strict_types=1);

use Domains\Author\Models\Author;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

/**
 * AuthorControllerTest
 */
class AuthorControllerTest extends TestCase
{
    /**
     * test_it_can_get_authors_list
     */
    public function test_it_can_get_authors_list(): void
    {
        Author::factory(10)->create();

        $author = Author::first();

        $response = $this->getJson('/api/v1/authors');

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
     * test_it_can_get_specific_author
     */
    public function test_it_can_get_specific_author(): void
    {
        $author = Author::factory()->create();
        $response = $this->getJson('/api/v1/authors/14');
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
}
