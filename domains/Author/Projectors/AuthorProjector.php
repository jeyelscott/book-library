<?php

declare(strict_types=1);

namespace Domains\Author\Projectors;

use Domains\Author\Events\AuthorCreated;
use Domains\Author\Projections\Author;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class AuthorProjector extends Projector
{
    public function onAuthorCreated(AuthorCreated $event)
    {
        (new Author($event->authorAttributes))->writeable()->save();
    }
}
