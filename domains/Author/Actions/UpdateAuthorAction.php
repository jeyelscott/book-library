<?php

declare(strict_types=1);

namespace Domains\Author\Actions;

use Domains\Author\DataTransferObjects\AuthorData;
use Domains\Author\Models\Author;

/**
 * UpdateAuthorAction
 */
class UpdateAuthorAction
{
    /**
     * execute
     *
     * @param  mixed $author
     * @param  mixed $authorData
     * @return Author
     */
    public function execute(Author $author, AuthorData $authorData): Author
    {
        $author->update([
            'name' => $authorData->name,
            'description' => $authorData->description,
            'contact_number' => $authorData->contact_number,
            'email' => $authorData->email,
            'date_of_birth' => $authorData->date_of_birth,
            'address' => $authorData->address,
        ]);

        $author->books()->sync($authorData->books);

        return $author;
    }
}
