<?php

declare(strict_types=1);

namespace App\HttpApi\V1\Controllers\Author;

use App\Http\Controllers\Controller;
use Domains\Author\Projections\Author;
use Domains\Author\Resources\AuthorResource;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\JsonApiResourceCollection;

/**
 * AuthorController
 */
class AuthorController extends Controller
{
    /**
     * index
     */
    public function index(): JsonApiResourceCollection
    {
        return AuthorResource::collection(Author::paginate());
    }

    /**
     * show
     *
     * @param  mixed  $author
     */
    public function show(Author $author): JsonApiResource
    {
        return AuthorResource::make($author);
    }
}
