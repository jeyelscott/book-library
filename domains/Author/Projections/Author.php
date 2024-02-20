<?php

declare(strict_types=1);

namespace Domains\Author\Projections;

use Database\Factories\AuthorFactory;
use Domains\Author\Events\AuthorCreated;
use Domains\Author\Traits\AuthorRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Ramsey\Uuid\Uuid;
use Spatie\EventSourcing\Projections\Projection;

/**
 * Author
 */
class Author extends Projection
{
    use AuthorRelationship, HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'description',
        'contact_number',
        'email',
        'date_of_birth',
        'address',
        'books'
    ];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = [
        'date_of_birth',
    ];

    /**
     * newFactory
     */
    protected static function newFactory(): AuthorFactory
    {
        return new AuthorFactory();
    }
}
