<?php

declare(strict_types=1);

namespace Domains\Book;

use Domains\Book\DataTransferObjects\BookData;
use Domains\Book\Events\AddAuthorsToBook;
use Domains\Book\Events\AddGenresToBook;
use Domains\Book\Events\BookCreated;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class BookAggregateRoot extends AggregateRoot
{
    public function createBook(BookData $bookData)
    {
        $this->recordThat(new BookCreated(
            $bookData->uuid,
            $bookData->name,
            $bookData->description,
            $bookData->status,
            $bookData->is_featured
        ));

        return $this;
    }

    public function addAuthorsToBook(string $uuid, array $authorsId): self
    {
        $this->recordThat(new AddAuthorsToBook($uuid, $authorsId));

        return $this;
    }

    public function addGenresToBook(string $uuid, array $genresId): self
    {
        $this->recordThat(new AddGenresToBook($uuid, $genresId));

        return $this;
    }
}
