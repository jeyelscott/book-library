<?php

declare(strict_types=1);

namespace Domains\Book\Projections;

use Database\Factories\BookFactory;
use Domains\Book\Traits\BookRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\EventSourcing\Projections\Projection;

/**
 * Book
 */
class Book extends Projection
{
    use BookRelationship, HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'description',
        'status',
        'is_featured',
    ];

    /**
     * newFactory
     */
    protected static function newFactory(): BookFactory
    {
        return new BookFactory();
    }
}
