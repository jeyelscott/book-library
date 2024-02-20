<?php

declare(strict_types=1);

namespace Domains\Author\Projectors;

use Domains\Author\Events\AddBooksToAuthor;
use Domains\Author\Events\AuthorCreated;
use Domains\Author\Projections\Author;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class AuthorProjector extends Projector
{
    public function onAuthorCreated(AuthorCreated $event): void
    {
        Author::new()
            ->writeable()
            ->create([
                'uuid' => $event->uuid,
                'name' => $event->name,
                'description' => $event->description,
                'contact_number' => $event->contact_number,
                'email' => $event->email,
                'date_of_birth' => $event->date_of_birth,
                'address' => $event->address,
            ])
            ->save();
    }

    public function onAddBooksToAuthor(AddBooksToAuthor $event): void
    {
        $author = Author::where('uuid', $event->uuid)->first();
        $author->books()->attach($event->booksId);
    }
}
