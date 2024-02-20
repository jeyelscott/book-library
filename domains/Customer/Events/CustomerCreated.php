<?php

declare(strict_types=1);

namespace Domains\Customer\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class CustomerCreated extends ShouldBeStored
{
    public function __construct(
        public readonly string $uuid,
        public readonly string $name,
        public readonly string $gender,
        public readonly string $date_of_birth,
        public readonly string $address,
        public readonly string $contact_number,
        public readonly string $email,
        public readonly string $password,
        public readonly string $verification_token,
        public readonly string $verification_token_expires_at,
    ) {
    }
}
