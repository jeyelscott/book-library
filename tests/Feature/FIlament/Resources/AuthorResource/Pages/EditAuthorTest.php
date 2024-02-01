<?php

declare(strict_types=1);

use App\Filament\Resources\AuthorResource;
use App\Filament\Resources\AuthorResource\Pages\EditAuthor;
use Domains\Author\Models\Author;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * EditAuthorTest
 */
class EditAuthorTest extends TestCase
{
    /**
     * test_it_can_render_edit_author_page
     */
    public function test_it_can_render_edit_author_page(): void
    {
        $this->get(AuthorResource::getUrl('edit', [
            'record' => Author::factory()->create(),
        ]))->assertSuccessful();
    }

    /**
     * test_it_can_update_author
     */
    public function test_it_can_update_author(): void
    {
        $author = Author::factory()->create();

        Livewire::test(EditAuthor::class, [
            'record' => $author->getRouteKey(),
        ])
            ->assertFormSet([
                'name' => $author->name,
                'description' => $author->description,
                'contact_number' => $author->contact_number,
                'email' => $author->email,
                'date_of_birth' => $author->date_of_birth,
                'address' => $author->address,
            ]);
    }
}
