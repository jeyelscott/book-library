<?php

declare(strict_types=1);

namespace Domains\Genre\DataTransferObjects;

/**
 * GenreData
 */
class GenreData
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        public readonly string $name,
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
        );
    }
}
