<?php

declare(strict_types=1);

namespace Domains\Genre\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class GenreCreated extends ShouldBeStored
{
    /**
     * genreAttributes
     *
     * @var array
     */
    public $genreAttributes;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(array $genreAttributes)
    {
        $this->genreAttributes = $genreAttributes;
    }
}
