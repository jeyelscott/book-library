<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Domains\Customer\Actions\CreateCustomerAction;
use Domains\Customer\Actions\SendActivationEmailToCustomerAction;
use Domains\Customer\DataTransferObjects\CustomerData;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    public function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            $customer = app(CreateCustomerAction::class)->execute(CustomerData::fromArray($data));
            app(SendActivationEmailToCustomerAction::class)->execute($customer);

            return $customer;
        });
    }
}
