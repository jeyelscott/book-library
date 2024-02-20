<?php

declare(strict_types=1);

namespace Domains\Book\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class BookUpdated extends ShouldBeStored
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        public readonly string $uuid,
        public readonly string $name,
        public readonly string $description,
        public readonly string $status,
        public readonly bool $is_featured
    ) {
    }
}
