<?php

declare(strict_types=1);

namespace Domains\Customer\DataTransferObjects;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * CustomerData
 */
class CustomerData
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        public readonly string $name,
        public readonly string $gender,
        public readonly string $date_of_birth,
        public readonly string $address,
        public readonly string $contact_number,
        public readonly string $email,
    ) {
    }

    /**
     * fromArray
     *
     * @param  mixed  $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            gender: $data['gender'],
            date_of_birth: $data['date_of_birth'],
            address: $data['address'],
            contact_number: $data['contact_number'],
            email: $data['email'],
        );
    }
}
