<?php

declare(strict_types=1);

namespace App\Filament\Resources\AuthorResource\Pages;

use App\Filament\Resources\AuthorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

/**
 * ListAuthors
 */
class ListAuthors extends ListRecords
{
    protected static string $resource = AuthorResource::class;

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
