<?php

declare(strict_types=1);

namespace Domains\Book\Actions;

use Domains\Book\BookAggregateRoot;
use Domains\Book\DataTransferObjects\BookData;
use Domains\Book\Projections\Book;

/**
 * UpdateBookAction
 */
class UpdateBookAction
{
    /**
     * execute
     *
     * @param  mixed  $book
     * @param  mixed  $bookData
     */
    public function execute(Book $book, BookData $bookData): Book
    {
        BookAggregateRoot::retrieve($book->uuid)
            ->updateBook($bookData)
            ->updateAuthorsToBook($book->uuid, $bookData->authors)
            ->updateGenresToBook($book->uuid, $bookData->genres)
            ->persist();

        return $book;
    }
}
