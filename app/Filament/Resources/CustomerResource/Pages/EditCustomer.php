<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Domains\Customer\Actions\UpdateCustomerAction;
use Domains\Customer\DataTransferObjects\CustomerData;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditCustomer extends EditRecord
{
    protected static string $resource = CustomerResource::class;

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
        $data['uuid'] = $record->uuid;

        return DB::transaction(fn () => app(UpdateCustomerAction::class)->execute($record, CustomerData::fromArray($data)));
    }
}
