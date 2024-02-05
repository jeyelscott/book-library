<?php

declare(strict_types=1);

namespace Domains\Book\Resources;

use Domains\Author\Resources\AuthorResource;
use Domains\Genre\Resources\GenreResource;
use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class BookResource extends JsonApiResource
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
            'status' => $this->status,
            'is_featured' => $this->is_featured,
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
            'authors' => fn () => AuthorResource::collection($this->authors),
            'genres' => fn () => GenreResource::collection($this->genres),
        ];
    }
}
