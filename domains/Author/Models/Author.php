<?php

declare(strict_types=1);

namespace Domains\Author\Models;

use Database\Factories\AuthorFactory;
use Domains\Author\Traits\AuthorRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Author
 */
class Author extends Model
{
    use AuthorRelationship, HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'email',
        'contact_number',
        'date_of_birth',
        'address',
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
