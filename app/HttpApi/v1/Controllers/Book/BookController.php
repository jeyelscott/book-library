<?php

declare(strict_types=1);

namespace App\HttpApi\V1\Controllers\Book;

use App\Http\Controllers\Controller;
use Domains\Book\Models\Book;
use Domains\Book\Resources\BookResource;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\JsonApiResourceCollection;

/**
 * BookController
 */
class BookController extends Controller
{
    /**
     * index
     *
     * @return JsonApiResourceCollection
     */
    public function index(): JsonApiResourceCollection
    {
        return BookResource::collection(Book::paginate());
    }

    /**
     * show
     *
     * @param  mixed $book
     * @return JsonApiResource
     */
    public function show(Book $book): JsonApiResource
    {
        return BookResource::make($book);
    }
}
