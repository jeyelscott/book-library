<?php

declare(strict_types=1);

namespace Domains\Book\Projectors;

use Domains\Book\Events\AddAuthorsToBook;
use Domains\Book\Events\AddGenresToBook;
use Domains\Book\Events\BookCreated;
use Domains\Book\Projections\Book;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class BookProjector extends Projector
{
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

    public function onAddAuthorsToBook(AddAuthorsToBook $event): void
    {
        $book = Book::where('uuid', $event->uuid)->first();

        $book->authors()->attach($event->authorsId);
    }

    public function onAddGenresToBook(AddGenresToBook $event): void
    {
        $book = Book::where('uuid', $event->uuid)->first();

        $book->genres()->attach($event->genresId);
    }
}
