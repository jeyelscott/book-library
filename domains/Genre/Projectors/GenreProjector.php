<?php

declare(strict_types=1);

namespace Domains\Genre\Projectors;

use Domains\Genre\Events\GenreCreated;
use Domains\Genre\Projections\Genre;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class GenreProjector extends Projector
{
    /**
     * onGenreCreated
     *
     * @param  mixed  $event
     * @return void
     */
    public function onGenreCreated(GenreCreated $event)
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
}
