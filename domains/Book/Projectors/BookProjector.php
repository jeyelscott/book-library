<?php

declare(strict_types=1);

namespace Domains\Book\Projectors;

use Domains\Book\Events\AddAuthorsToBook;
use Domains\Book\Events\AddGenresToBook;
use Domains\Book\Events\BookCreated;
use Domains\Book\Events\BookUpdated;
use Domains\Book\Events\UpdateAuthorsToBook;
use Domains\Book\Events\UpdateGenresToBook;
use Domains\Book\Projections\Book;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class BookProjector extends Projector
{
    /**
     * onBookCreated
     */
    public function onBookCreated(BookCreated $event): void
    {
        Book::new()
            ->writeable()
            ->create([
                'uuid' => $event->uuid,
                'name' => $event->name,
                'description' => $event->description,
                'status' => $event->status,
                'is_featured' => $event->is_featured,
            ])
            ->save();
    }

    /**
     * onBookUpdated
     */
    public function onBookUpdated(BookUpdated $event): void
    {
        $book = Book::where('uuid', $event->uuid)->first();
        $book->writeable()
            ->update([
                'uuid' => $event->uuid,
                'name' => $event->name,
                'description' => $event->description,
                'status' => $event->status,
                'is_featured' => $event->is_featured,
            ]);
    }

    /**
     * onAddAuthorsToBook
     */
    public function onAddAuthorsToBook(AddAuthorsToBook $event): void
    {
        $book = Book::where('uuid', $event->uuid)->first();

        $book->authors()->attach($event->authorsId);
    }

    /**
     * onUpdateAuthorsToBook
     */
    public function onUpdateAuthorsToBook(UpdateAuthorsToBook $event): void
    {
        $book = Book::where('uuid', $event->uuid)->first();

        $book->authors()->sync($event->authorsId);
    }

    /**
     * onAddGenresToBook
     */
    public function onAddGenresToBook(AddGenresToBook $event): void
    {
        $book = Book::where('uuid', $event->uuid)->first();

        $book->genres()->attach($event->genresId);
    }

    /**
     * onUpdateGenresToBook
     */
    public function onUpdateGenresToBook(UpdateGenresToBook $event): void
    {
        $book = Book::where('uuid', $event->uuid)->first();

        $book->genres()->sync($event->genresId);
    }
}
