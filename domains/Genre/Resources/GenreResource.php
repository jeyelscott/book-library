<?php

declare(strict_types=1);

namespace Domains\Genre\Resources;

use Domains\Book\Resources\BookResource;
use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class GenreResource extends JsonApiResource
{
    /**
     * toAttributes
     *
     * @param  mixed  $request
     */
    public function toAttributes(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

    /**
     * toRelationships
     *
     * @param  mixed  $request
     */
    public function toRelationships(Request $request): array
    {
        return [
            'books' => fn () => BookResource::collection($this->books),
        ];
    }
}
