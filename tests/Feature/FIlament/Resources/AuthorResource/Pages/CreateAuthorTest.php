<?php

declare(strict_types=1);

use App\Filament\Resources\AuthorResource;
use App\Filament\Resources\AuthorResource\Pages\CreateAuthor;
use Domains\Author\Projections\Author;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * CreateAuthorTest
 */
class CreateAuthorTest extends TestCase
{
    /**
     * test_it_can_render_create_author_page
     */
    public function test_it_can_render_create_author_page(): void
    {
        $this->get(AuthorResource::getUrl('create'))->assertSuccessful();
    }

    /**
     * test_it_can_create_author
     */
    public function test_it_can_create_author(): void
    {
        $author = Author::factory()->make();

        Livewire::test(CreateAuthor::class)
            ->fillForm([
                'name' => $author->name,
                'description' => $author->description,
                'contact_number' => $author->contact_number,
                'email' => $author->email,
                'date_of_birth' => $author->date_of_birth,
                'address' => $author->address,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas(Author::class, [
            'name' => $author->name,
            'description' => $author->description,
            'contact_number' => $author->contact_number,
            'email' => $author->email,
            'date_of_birth' => $author->date_of_birth,
            'address' => $author->address,
        ]);
    }
}
