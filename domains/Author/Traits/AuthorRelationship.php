<?php

namespace Domains\Author\Traits;

use Domains\Book\Models\Book;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait AuthorRelationship
{
    /**
     * Get all of the books for the AuthorRelationship
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
