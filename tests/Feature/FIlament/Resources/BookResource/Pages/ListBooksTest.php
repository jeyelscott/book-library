<?php

declare(strict_types=1);

use App\Filament\Resources\BookResource;
use App\Filament\Resources\BookResource\Pages\ListBooks;
use Domains\Book\Models\Book;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * ListBooksTest
 */
class ListBooksTest extends TestCase
{
    /**
     * test_it_can_render_page
     */
    public function test_it_can_render_page(): void
    {
        $this->get(BookResource::getUrl('index'))->assertSuccessful();
    }

    /**
     * test_it_can_list_books
     */
    public function test_it_can_list_books(): void
    {
        $books = Book::factory(10)->create();
        Livewire::test(ListBooks::class)->assertCountTableRecords(count($books));
    }
}
