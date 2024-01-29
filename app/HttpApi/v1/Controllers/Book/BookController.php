<?php

declare(strict_types=1);

namespace App\HttpApi\V1\Controllers\Book;

use App\Http\Controllers\Controller;
use Domains\Book\Models\Book;
use Domains\Book\Resources\BookResource;
use Illuminate\Http\JsonResponse;
use TiMacDonald\JsonApi\JsonApiResource;
use TiMacDonald\JsonApi\JsonApiResourceCollection;

class BookController extends Controller
{
    public function index(): JsonApiResourceCollection
    {
        return BookResource::collection(Book::paginate());
    }

    public function show(Book $book): JsonApiResource
    {
        return BookResource::make($book);
    }
}
