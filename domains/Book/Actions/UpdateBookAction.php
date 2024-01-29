<?php

declare(strict_types=1);

namespace Domains\Book\Actions;

use Domains\Book\DataTransferObjects\BookData;
use Domains\Book\Models\Book;

class UpdateBookAction
{
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
