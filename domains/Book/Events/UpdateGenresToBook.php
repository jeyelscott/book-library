<?php

declare(strict_types=1);

namespace Domains\Book\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class UpdateGenresToBook extends ShouldBeStored
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        public readonly string $uuid,
        public readonly array $genresId
    ) {
    }
}
