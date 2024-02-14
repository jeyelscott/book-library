<?php

declare(strict_types=1);

namespace Domains\Genre\Models;

use Database\Factories\GenreFactory;
use Domains\Genre\Traits\GenreRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Genre
 */
class Genre extends Model
{
    use GenreRelationship, HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * newFactory
     */
    protected static function newFactory(): GenreFactory
    {
        return new GenreFactory();
    }
}
