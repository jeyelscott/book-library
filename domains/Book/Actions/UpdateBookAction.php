<?php

declare(strict_types=1);

namespace Domains\Book\Actions;

use Domains\Book\DataTransferObjects\BookData;
use Domains\Book\Models\Book;

/**
 * UpdateBookAction
 */
class UpdateBookAction
{
    /**
     * execute
     *
     * @param  mixed $book
     * @param  mixed $bookData
     * @return Book
     */
    public function execute(Book $book, BookData $bookData): Book
    {
        $book->update([
            'name' => $bookData->name,
            'description' => $bookData->description,
            'status' => $bookData->status,
        ]);

        return $book;
    }
}
