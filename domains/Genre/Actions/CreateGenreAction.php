<?php

declare(strict_types=1);

namespace Domains\Genre\Actions;

use Domains\Genre\DataTransferObjects\GenreData;
use Domains\Genre\Projections\Genre;

/**
 * CreateGenreAction
 */
class CreateGenreAction
{
    /**
     * execute
     *
     * @param  mixed  $genreData
     */
    public function execute(GenreData $genreData): Genre
    {
        $genre = Genre::createWithAttributes([
            'name' => $genreData->name,
            'description' => $genreData->description,
        ]);

        return $genre;
    }
}
