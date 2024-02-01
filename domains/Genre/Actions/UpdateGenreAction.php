<?php

declare(strict_types=1);

namespace Domains\Genre\Actions;

use Domains\Genre\DataTransferObjects\GenreData;
use Domains\Genre\Models\Genre;

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
        $genre->update([
            'name' => $genreData->name,
            'description' => $genreData->description,
        ]);

        return $genre;
    }
}
