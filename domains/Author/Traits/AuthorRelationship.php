<?php

namespace Domains\Author\Traits;

use Domains\Book\Projections\Book;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait AuthorRelationship
{
    /**
     * books
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
