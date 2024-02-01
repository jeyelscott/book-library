<?php

declare(strict_types=1);

namespace App\Filament\Resources\GenreResource\Pages;

use App\Filament\Resources\GenreResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

/**
 * ListGenres
 */
class ListGenres extends ListRecords
{
    protected static string $resource = GenreResource::class;

    /**
     * getHeaderActions
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
