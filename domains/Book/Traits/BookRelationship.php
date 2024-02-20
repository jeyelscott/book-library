<?php

declare(strict_types=1);

namespace Domains\Book\Traits;

use Domains\Author\Projections\Author;
use Domains\Genre\Projections\Genre;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BookRelationship
{
    /**
     * authors
     */
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

    /**
     * genres
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }
}
