<?php

declare(strict_types=1);

namespace Domains\Genre\Actions;

use Domains\Genre\DataTransferObjects\GenreData;
use Domains\Genre\GenreAggregateRoot;
use Domains\Genre\Projections\Genre;

/**
 * CreateGenreAction
 */
class CreateGenreAction
{
    private GenreAggregateRoot $genreAggregateRoot;
    private Genre $model;

    /**
     * __construct
     *
     * @param  GenreAggregateRoot $genreAggregateRoot
     * @return void
     */
    public function __construct(GenreAggregateRoot $genreAggregateRoot, Genre $model)
    {
        $this->genreAggregateRoot = $genreAggregateRoot;
        $this->model = $model;
    }

    /**
     * execute
     *
     * @param  GenreData $genreData
     * @return Genre
     */
    public function execute(GenreData $genreData): Genre
    {
        $this->genreAggregateRoot->retrieve($genreData->uuid)
            ->createGenre($genreData)
            ->persist();

        return $this->model->where('uuid', $genreData->uuid)->first();
    }
}
