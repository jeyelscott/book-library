<?php

declare(strict_types=1);

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Domains\Book\Actions\CreateBookAction;
use Domains\Book\DataTransferObjects\BookData;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

/**
 * CreateBook
 */
class CreateBook extends CreateRecord
{
    protected static string $resource = BookResource::class;

    /**
     * handleRecordCreation
     *
     * @param  mixed  $data
     */
    protected function handleRecordCreation(array $data): Model
    {
        $data['uuid'] = (string) Uuid::uuid4();

        return DB::transaction(fn () => app(CreateBookAction::class)->execute(BookData::fromArray($data)));
    }
}
