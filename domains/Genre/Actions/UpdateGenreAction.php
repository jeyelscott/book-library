<?php

declare(strict_types=1);

namespace Domains\Genre\Actions;

use Domains\Genre\DataTransferObjects\GenreData;
use Domains\Genre\GenreAggregateRoot;
use Domains\Genre\Projections\Genre;

/**
 * UpdateGenreAction
 */
class UpdateGenreAction
{
    private GenreAggregateRoot $genreAggregateRoot;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(GenreAggregateRoot $genreAggregateRoot)
    {
        $this->genreAggregateRoot = $genreAggregateRoot;
    }

    /**
     * execute
     */
    public function execute(Genre $genre, GenreData $genreData): Genre
    {
        $this->genreAggregateRoot->retrieve($genre->uuid)
            ->updateGenre($genre, $genreData)
            ->persist();

        return $genre;
    }
}
