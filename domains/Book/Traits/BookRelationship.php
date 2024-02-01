<?php

declare(strict_types=1);

namespace Domains\Book\Traits;

use Domains\Author\Models\Author;
use Domains\Genre\Models\Genre;
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
