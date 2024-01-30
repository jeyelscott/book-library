<?php

declare(strict_types=1);

namespace Domains\Author\Actions;

use Domains\Author\DataTransferObjects\AuthorData;
use Domains\Author\Models\Author;

class CreateAuthorAction
{
    public function execute(AuthorData $authorData): Author
    {
        $author = Author::create([
            'name' => $authorData->name,
            'description' => $authorData->description,
            'contact_number' => $authorData->contact_number,
            'email' => $authorData->email,
            'date_of_birth' => $authorData->date_of_birth,
            'address' => $authorData->address,
        ]);

        $author->books()->attach($authorData->books);

        return $author;
    }
}
