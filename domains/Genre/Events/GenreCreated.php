<?php

declare(strict_types=1);

namespace Domains\Genre\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class GenreCreated extends ShouldBeStored
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        public readonly string $uuid,
        public readonly string $name,
        public readonly ?string $description,
    ) {
    }
}
