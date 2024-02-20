<?php

declare(strict_types=1);

namespace Domains\Genre;

use Domains\Genre\DataTransferObjects\GenreData;
use Domains\Genre\Events\GenreCreated;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class GenreAggregateRoot extends AggregateRoot
{
    public function createGenre(GenreData $genreData)
    {
        $this->recordThat(new GenreCreated(
            $genreData->uuid,
            $genreData->name,
            $genreData->description,
        ));

        return $this;
    }
}
