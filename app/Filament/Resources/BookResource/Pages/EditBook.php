<?php

declare(strict_types=1);

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Domains\Book\Actions\UpdateBookAction;
use Domains\Book\DataTransferObjects\BookData;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditBook extends EditRecord
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        return DB::transaction(fn () => app(UpdateBookAction::class)->execute($record, BookData::fromArray($data)));
    }
}
