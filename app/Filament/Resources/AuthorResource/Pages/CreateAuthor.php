<?php

declare(strict_types=1);

namespace App\Filament\Resources\AuthorResource\Pages;

use App\Filament\Resources\AuthorResource;
use Domains\Author\Actions\CreateAuthorAction;
use Domains\Author\DataTransferObjects\AuthorData;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

/**
 * CreateAuthor
 */
class CreateAuthor extends CreateRecord
{
    protected static string $resource = AuthorResource::class;

    /**
     * handleRecordCreation
     *
     * @param  mixed  $data
     */
    public function handleRecordCreation(array $data): Model
    {
        $data['uuid'] = (string) Uuid::uuid4();

        return DB::transaction(fn () => app(CreateAuthorAction::class)->execute(AuthorData::fromArray($data)));
    }
}
