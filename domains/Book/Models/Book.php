<?php

declare(strict_types=1);

namespace Domains\Book\Models;

use Database\Factories\BookFactory;
use Domains\Book\Traits\BookRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Book
 */
class Book extends Model
{
    use BookRelationship, HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
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
