<?php

declare(strict_types=1);

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

/**
 * ListBooks
 */
class ListBooks extends ListRecords
{
    protected static string $resource = BookResource::class;

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
