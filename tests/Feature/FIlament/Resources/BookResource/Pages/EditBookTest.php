<?php

declare(strict_types=1);

use App\Filament\Resources\BookResource;
use App\Filament\Resources\BookResource\Pages\EditBook;
use Domains\Book\Projections\Book;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * EditBookTest
 */
class EditBookTest extends TestCase
{
    /**
     * test_it_can_render_edit_book_page
     */
    public function test_it_can_render_edit_book_page(): void
    {
        $this->get(BookResource::getUrl('edit', [
            'record' => Book::factory()->create(),
        ]))->assertSuccessful();
    }

    /**
     * test_it_can_update_book
     */
    public function test_it_can_update_book(): void
    {
        $book = Book::factory()->create();

        Livewire::test(EditBook::class, [
            'record' => $book->getRouteKey(),
        ])
            ->assertFormSet([
                'name' => $book->name,
                'description' => $book->description,
                'status' => $book->status,
            ]);
    }
}
