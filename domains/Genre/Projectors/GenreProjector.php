<?php

declare(strict_types=1);

namespace Domains\Genre\Projectors;

use Domains\Genre\Events\GenreCreated;
use Domains\Genre\Events\GenreUpdated;
use Domains\Genre\Projections\Genre;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class GenreProjector extends Projector
{
    /**
     * onGenreCreated
     *
     * @param  mixed  $event
     */
    public function onGenreCreated(GenreCreated $event): void
    {
        Genre::new()
            ->writeable()
            ->create([
                'uuid' => $event->uuid,
                'name' => $event->name,
                'description' => $event->description,
            ])
            ->save();
    }

    /**
     * onGenreUpdated
     */
    public function onGenreUpdated(GenreUpdated $event): void
    {
        $genre = Genre::where('uuid', $event->uuid)->first();
        $genre->writeable()
            ->update([
                'name' => $event->name,
                'description' => $event->description,
            ])
            ->save();
    }
}
