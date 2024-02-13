<?php

declare(strict_types=1);

namespace App\HttpApi\V1\Controllers\Genre;

use App\Http\Controllers\Controller;
use Domains\Genre\Models\Genre;
use Domains\Genre\Resources\GenreResource;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\JsonApiResourceCollection;

/**
 * GenreController
 */
class GenreController extends Controller
{
    /**
     * index
     */
    public function index(): JsonApiResourceCollection
    {
        return GenreResource::collection(Genre::paginate());
    }

    /**
     * show
     *
     * @param  mixed  $genre
     */
    public function show(Genre $genre): JsonApiResource
    {
        return GenreResource::make($genre);
    }
}
