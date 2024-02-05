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
            name: $data['name'],
            description: $data['description'],
            status: $data['status'],
            authors: $data['authors'],
            genres: $data['genres'],
            is_featured: $data['is_featured'],
        );
    }
}
