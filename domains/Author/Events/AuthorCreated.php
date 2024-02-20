<?php

declare(strict_types=1);

namespace Domains\Author\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

/**
 * AuthorCreated
 */
class AuthorCreated extends ShouldBeStored
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
        public readonly string $contact_number,
        public readonly string $email,
        public readonly string $date_of_birth,
        public readonly string $address,
    ) {
    }
}
