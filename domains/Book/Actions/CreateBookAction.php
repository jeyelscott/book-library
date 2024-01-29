<?php

declare(strict_types=1);

namespace Domains\Book\Actions;

use Domains\Book\DataTransferObjects\BookData;
use Domains\Book\Models\Book;

class CreateBookAction
{
    public function execute(BookData $bookData): Book
    {
        $book = Book::create([
            'name' => $bookData->name,
            'description' => $bookData->description,
            'status' => $bookData->status,
        ]);

        return $book;
    }
}
