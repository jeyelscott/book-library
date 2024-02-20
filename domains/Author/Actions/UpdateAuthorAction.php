<?php

declare(strict_types=1);

namespace Domains\Author\Actions;

use Domains\Author\AuthorAggregateRoot;
use Domains\Author\DataTransferObjects\AuthorData;
use Domains\Author\Projections\Author;

/**
 * UpdateAuthorAction
 */
class UpdateAuthorAction
{
    /**
     * execute
     *
     * @param  mixed  $author
     * @param  mixed  $authorData
     */
    public function execute(Author $author, AuthorData $authorData): Author
    {
        AuthorAggregateRoot::retrieve($author->uuid)
            ->updateAuthor($authorData)
            ->updateBooksToAuthor($authorData->uuid, $authorData->books)
            ->persist();

        $author->refresh();

        return $author;
    }
}
