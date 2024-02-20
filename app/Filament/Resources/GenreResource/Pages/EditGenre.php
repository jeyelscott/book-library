<?php

declare(strict_types=1);

namespace App\Filament\Resources\GenreResource\Pages;

use App\Filament\Resources\GenreResource;
use Domains\Genre\Actions\UpdateGenreAction;
use Domains\Genre\DataTransferObjects\GenreData;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * EditGenre
 */
class EditGenre extends EditRecord
{
    protected static string $resource = GenreResource::class;

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
        $data['uuid'] = (string) $record->uuid;

        return DB::transaction(fn () => app(UpdateGenreAction::class)->execute($record, GenreData::fromArray($data)));
    }
}
