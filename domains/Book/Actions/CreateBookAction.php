<?php

declare(strict_types=1);

namespace Domains\Book\Actions;

use Domains\Book\BookAggregateRoot;
use Domains\Book\DataTransferObjects\BookData;
use Domains\Book\Projections\Book;

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
    // public function execute(BookData $bookData): Book
    // {
    //     $book = Book::create([
    //         'name' => $bookData->name,
    //         'description' => $bookData->description,
    //         'status' => $bookData->status,
    //         'is_featured' => $bookData->is_featured ? 1 : 0,
    //     ]);

    //     $book->authors()->attach($bookData->authors);
    //     $book->genres()->attach($bookData->genres);

    //     return $book;
    // }

    public function execute(BookData $bookData): Book
    {
        BookAggregateRoot::retrieve($bookData->uuid)
            ->createBook($bookData)
            ->addAuthorsToBook($bookData->uuid, $bookData->authors)
            ->addGenresToBook($bookData->uuid, $bookData->genres)
            ->persist();

        $book = Book::where('uuid', $bookData->uuid)->first();

        return $book;
    }
}
