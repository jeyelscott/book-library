<?php

declare(strict_types=1);

namespace Domains\Book\Traits;

use Domains\Author\Models\Author;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BookRelationship
{
    /**
     * Get all of the authors for the BookRelationship
     */
    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class);
    }
}
