<?php

declare(strict_types=1);

namespace Domains\Author\Models;

use Domains\Author\Traits\AuthorRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use AuthorRelationship, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'email',
        'contact_number',
        'date_of_birth',
        'address',
    ];

    protected $dates = [
        'date_of_birth',
    ];
}
