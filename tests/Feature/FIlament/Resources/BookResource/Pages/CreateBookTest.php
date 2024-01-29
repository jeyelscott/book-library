<?php

declare(strict_types=1);

use App\Filament\Resources\BookResource;
use App\Filament\Resources\BookResource\Pages\CreateBook;
use Domains\Book\Models\Book;
use Livewire\Livewire;
use Tests\TestCase;

class CreateBookTest extends TestCase
{
    public function test_it_can_render_create_book_page(): void
    {
        $this->get(BookResource::getUrl('create'))->assertSuccessful();
    }

    public function test_it_can_create_book(): void
    {
        $book = Book::factory()->make();

        Livewire::test(CreateBook::class)
            ->fillForm([
                'name' => $book->name,
                'description' => $book->description,
                'status' => $book->status,
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas(Book::class, [
            'name' => $book->name,
            'description' => $book->description,
            'status' => $book->status,
        ]);
    }
}
