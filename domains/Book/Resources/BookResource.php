<?php

declare(strict_types=1);

namespace Domains\Book\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class BookResource extends JsonApiResource
{
    public $attributes = [
        'name',
        'description',
        'status',
    ];
}
