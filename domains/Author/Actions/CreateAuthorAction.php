<?php

declare(strict_types=1);

namespace Domains\Author\Actions;

use Domains\Author\AuthorAggregateRoot;
use Domains\Author\DataTransferObjects\AuthorData;
use Domains\Author\Projections\Author;

/**
 * CreateAuthorAction
 */
class CreateAuthorAction
{
    /**
     * execute
     *
     * @param  AuthorData $authorData
     * @return Author
     */
    public function execute(AuthorData $authorData): Author
    {
        AuthorAggregateRoot::retrieve($authorData->uuid)
            ->createAuthor($authorData)
            ->addBooksToAuthor($authorData->uuid, $authorData->books)
            ->persist();

        $author = Author::where('uuid', $authorData->uuid)->first();

        return $author;
    }
}
