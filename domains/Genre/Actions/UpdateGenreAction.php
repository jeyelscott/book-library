<?php

declare(strict_types=1);

namespace Domains\Genre\Actions;

use Domains\Genre\DataTransferObjects\GenreData;
use Domains\Genre\Projections\Genre;

/**
 * UpdateGenreAction
 */
class UpdateGenreAction
{
    /**
     * execute
     *
     * @param  mixed  $genre
     * @param  mixed  $genreData
     */
    public function execute(Genre $genre, GenreData $genreData): Genre
    {

        return $genre;
    }
}
