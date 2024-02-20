<?php

declare(strict_types=1);

namespace Domains\Genre\Projections;

use Database\Factories\GenreFactory;
use Domains\Genre\Traits\GenreRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Ramsey\Uuid\Uuid;
use Spatie\EventSourcing\Projections\Projection;

/**
 * Genre
 */
class Genre extends Projection
{
    use GenreRelationship, HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'description',
    ];

    /**
     * uuid
     *
     * @param  mixed  $uuid
     */
    public static function uuid(string $uuid): ?Genre
    {
        return static::where('uuid', $uuid)->first();
    }

    /**
     * newFactory
     */
    protected static function newFactory(): GenreFactory
    {
        return new GenreFactory();
    }
}
