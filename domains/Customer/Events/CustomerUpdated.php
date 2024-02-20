<?php

declare(strict_types=1);

namespace Domains\Customer\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class CustomerUpdated extends ShouldBeStored
{
    public function __construct(
        public readonly string $uuid,
        public readonly string $name,
        public readonly string $gender,
        public readonly string $date_of_birth,
        public readonly string $address,
        public readonly string $contact_number,
        public readonly string $email,
    ) {
    }
}
