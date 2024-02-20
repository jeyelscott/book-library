<?php

declare(strict_types=1);

namespace Domains\Author\Projectors;

use Domains\Author\Events\AddBooksToAuthor;
use Domains\Author\Events\AuthorCreated;
use Domains\Author\Events\AuthorUpdated;
use Domains\Author\Events\UpdateBooksToAuthor;
use Domains\Author\Projections\Author;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class AuthorProjector extends Projector
{
    /**
     * onAuthorCreated
     *
     * @param  AuthorCreated $event
     * @return void
     */
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

    /**
     * onAuthorUpdated
     *
     * @param  AuthorUpdated $event
     * @return void
     */
    public function onAuthorUpdated(AuthorUpdated $event): void
    {
        $author = Author::where('uuid', $event->uuid)->first();

        $author->writeable()
            ->update([
                'name' => $event->name,
                'description' => $event->description,
                'contact_number' => $event->contact_number,
                'email' => $event->email,
                'date_of_birth' => $event->date_of_birth,
                'address' => $event->address,
            ]);
    }

    /**
     * onAddBooksToAuthor
     *
     * @param  AddBooksToAuthor $event
     * @return void
     */
    public function onAddBooksToAuthor(AddBooksToAuthor $event): void
    {
        $author = Author::where('uuid', $event->uuid)->first();

        $author->books()->attach($event->booksId);
    }

    /**
     * onUpdateBooksToAuthor
     *
     * @param  UpdateBooksToAuthor $event
     * @return void
     */
    public function onUpdateBooksToAuthor(UpdateBooksToAuthor $event): void
    {
        $author = Author::where('uuid', $event->uuid)->first();

        $author->books()->sync($event->booksId);
    }
}
