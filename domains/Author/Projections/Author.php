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
     * guarded
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = [
        'date_of_birth',
    ];

    /**
     * createWithAttributes
     */
    public static function createWithAttributes(array $attributes): Author
    {
        $attributes['uuid'] = (string) Uuid::uuid4();

        event(new AuthorCreated($attributes));

        return static::uuid($attributes['uuid']);
    }

    /**
     * uuid
     *
     * @param  mixed  $uuid
     */
    public static function uuid(string $uuid): ?Author
    {
        return static::where('uuid', $uuid)->first();
    }

    /**
     * newFactory
     */
    protected static function newFactory(): AuthorFactory
    {
        return new AuthorFactory();
    }
}
