<?php

declare(strict_types=1);

namespace Domains\Genre;

use Domains\Genre\DataTransferObjects\GenreData;
use Domains\Genre\Events\GenreCreated;
use Domains\Genre\Events\GenreUpdated;
use Domains\Genre\Projections\Genre;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class GenreAggregateRoot extends AggregateRoot
{
    /**
     * createGenre
     */
    public function createGenre(GenreData $genreData): GenreAggregateRoot
    {
        $this->recordThat(new GenreCreated(
            $genreData->uuid,
            $genreData->name,
            $genreData->description,
        ));

        return $this;
    }

    /**
     * updateGenre
     */
    public function updateGenre(Genre $genre, GenreData $genreData): GenreAggregateRoot
    {
        $this->recordThat(new GenreUpdated(
            $genre->uuid,
            $genreData->name,
            $genreData->description
        ));

        return $this;
    }
}
