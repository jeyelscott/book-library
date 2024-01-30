<?php

declare(strict_types=1);

namespace Domains\Book\Traits;

use Domains\Author\Models\Author;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BookRelationship
{
    /**
     * authors
     *
     * @return BelongsToMany
     */
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }
}
