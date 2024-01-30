<?php

declare(strict_types=1);

namespace Domains\Book\DataTransferObjects;

class BookData
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly string $status,
    ) {
        //
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            description: $data['description'],
            status: $data['status'],
        );
    }
}
