<?php

declare(strict_types=1);

namespace Domains\Author\Resources;

use Domains\Book\Resources\BookResource;
use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class AuthorResource extends JsonApiResource
{
    /**
     * toAttributes
     *
     * @param  mixed $request
     * @return array
     */
    public function toAttributes(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
        ];
    }

    /**
     * toRelationships
     *
     * @param  mixed $request
     * @return array
     */
    public function toRelationships(Request $request): array
    {
        return [
            'books' => fn () => BookResource::collection($this->books),
        ];
    }
}
