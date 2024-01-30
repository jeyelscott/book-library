<?php

declare(strict_types=1);

namespace Domains\Book\DataTransferObjects;

/**
 * BookData
 */
class BookData
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly string $status,
    ) {
        //
    }

    /**
     * fromArray
     *
     * @param  mixed $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            description: $data['description'],
            status: $data['status'],
        );
    }
}
