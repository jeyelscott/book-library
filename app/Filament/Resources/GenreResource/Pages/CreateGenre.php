<?php

namespace App\Filament\Resources\GenreResource\Pages;

use App\Filament\Resources\GenreResource;
use Domains\Genre\Actions\CreateGenreAction;
use Domains\Genre\DataTransferObjects\GenreData;
use Domains\Genre\Models\Genre;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateGenre extends CreateRecord
{
    protected static string $resource = GenreResource::class;

    public function handleRecordCreation(array $data): Model
    {
        return DB::transaction(fn () => app(CreateGenreAction::class)->execute(GenreData::fromArray($data)));
    }
}
