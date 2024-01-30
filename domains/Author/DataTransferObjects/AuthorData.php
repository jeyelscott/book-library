<?php

declare(strict_types=1);

namespace Domains\Author\DataTransferObjects;

/**
 * AuthorData
 */
class AuthorData
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $date_of_birth,
        public readonly string $address,
        public readonly array $books,
        public readonly ?string $contact_number,
        public readonly ?string $description,
    ) {
        //
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
            description: $data['description'],
            contact_number: $data['contact_number'],
            email: $data['email'],
            date_of_birth: $data['date_of_birth'],
            address: $data['address'],
            books: $data['books']
        );
    }
}
