<?php

declare(strict_types=1);

namespace Domains\Book\DataTransferObjects;

/**
 * BookData
 */
class BookData
{
    public function __construct(
        public readonly string $uuid,
        public readonly string $name,
        public readonly string $description,
        public readonly string $status,
        public readonly array $authors,
        public readonly array $genres,
        public readonly ?bool $is_featured,
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
            uuid: $data['uuid'],
            name: $data['name'],
            description: $data['description'],
            status: $data['status'],
            authors: $data['authors'],
            genres: $data['genres'],
            is_featured: $data['is_featured'],
        );
    }
}
