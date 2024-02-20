<?php

declare(strict_types=1);

namespace Domains\Genre\Traits;

use Domains\Book\Projections\Book;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait GenreRelationship
{
    /**
     * books
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
