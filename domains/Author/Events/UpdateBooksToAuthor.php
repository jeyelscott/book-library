<?php

declare(strict_types=1);

namespace Domains\Author\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

/**
 * UpdateBooksToAuthor
 */
class UpdateBooksToAuthor extends ShouldBeStored
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        public readonly string $uuid,
        public readonly array $booksId,
    ) {
    }
}
