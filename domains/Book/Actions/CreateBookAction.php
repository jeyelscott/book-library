<?php

declare(strict_types=1);

namespace Domains\Book\Actions;

use Domains\Book\DataTransferObjects\BookData;
use Domains\Book\Models\Book;

/**
 * CreateBookAction
 */
class CreateBookAction
{
    /**
     * execute
     *
     * @param  mixed  $bookData
     */
    public function execute(BookData $bookData): Book
    {
        $book = Book::create([
            'name' => $bookData->name,
            'description' => $bookData->description,
            'status' => $bookData->status,
            'is_featured' => $bookData->is_featured ? 1 : 0,
        ]);

        $book->authors()->attach($bookData->authors);
        $book->genres()->attach($bookData->genres);

        return $book;
    }
}
