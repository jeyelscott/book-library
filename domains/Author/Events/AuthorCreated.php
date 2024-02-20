<?php

declare(strict_types=1);

namespace Domains\Author\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

/**
 * AuthorCreated
 */
class AuthorCreated extends ShouldBeStored
{
    /**
     * authorAttributes
     *
     * @var array
     */
    public $authorAttributes;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(array $authorAttributes)
    {
        $this->authorAttributes = $authorAttributes;
    }
}
