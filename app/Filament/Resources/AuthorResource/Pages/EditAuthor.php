<?php

declare(strict_types=1);

namespace App\Filament\Resources\AuthorResource\Pages;

use App\Filament\Resources\AuthorResource;
use Domains\Author\Actions\UpdateAuthorAction;
use Domains\Author\DataTransferObjects\AuthorData;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * EditAuthor
 */
class EditAuthor extends EditRecord
{
    protected static string $resource = AuthorResource::class;

    /**
     * getHeaderActions
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * handleRecordUpdate
     *
     * @param  mixed  $record
     * @param  mixed  $data
     */
    public function handleRecordUpdate(Model $record, array $data): Model
    {
        return DB::transaction(fn () => app(UpdateAuthorAction::class)->execute($record, AuthorData::fromArray($data)));
    }
}
