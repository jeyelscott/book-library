<?php

declare(strict_types=1);

namespace Domains\Author;

use Domains\Author\DataTransferObjects\AuthorData;
use Domains\Author\Events\AddBooksToAuthor;
use Domains\Author\Events\AuthorCreated;
use Domains\Author\Events\AuthorUpdated;
use Domains\Author\Events\UpdateBooksToAuthor;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class AuthorAggregateRoot extends AggregateRoot
{
    public function createAuthor(AuthorData $authorData)
    {
        $this->recordThat(new AuthorCreated(
            $authorData->uuid,
            $authorData->name,
            $authorData->description,
            $authorData->contact_number,
            $authorData->email,
            $authorData->date_of_birth,
            $authorData->address,
        ));

        return $this;
    }

    public function updateAuthor(AuthorData $authorData)
    {
        $this->recordThat(new AuthorUpdated(
            $authorData->uuid,
            $authorData->name,
            $authorData->description,
            $authorData->contact_number,
            $authorData->email,
            $authorData->date_of_birth,
            $authorData->address,
        ));

        return $this;
    }

    public function addBooksToAuthor(string $uuid, array $booksId)
    {
        $this->recordThat(new AddBooksToAuthor($uuid, $booksId));

        return $this;
    }

    public function updateBooksToAuthor(string $uuid, array $booksId)
    {
        $this->recordThat(new UpdateBooksToAuthor($uuid, $booksId));

        return $this;
    }
}
