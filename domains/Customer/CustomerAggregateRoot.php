<?php

declare(strict_types=1);

namespace Domains\Customer;

use Domains\Customer\DataTransferObjects\CustomerData;
use Domains\Customer\Events\CustomerCreated;
use Domains\Customer\Events\CustomerUpdated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\EventSourcing\AggregateRoots\AggregateRoot;

class CustomerAggregateRoot extends AggregateRoot
{
    public function createCustomer(CustomerData $customerData)
    {
        $this->recordThat(new CustomerCreated(
            $customerData->uuid,
            $customerData->name,
            $customerData->gender,
            $customerData->date_of_birth,
            $customerData->address,
            $customerData->contact_number,
            $customerData->email,
            Hash::make(Str::random(16)),
            Str::random(16),
            date('Y-m-d H:i:s', strtotime('+2 days')),
        ));

        return $this;
    }

    public function updateCustomer(CustomerData $customerData)
    {
        $this->recordThat(new CustomerUpdated(
            $customerData->uuid,
            $customerData->name,
            $customerData->gender,
            $customerData->date_of_birth,
            $customerData->address,
            $customerData->contact_number,
            $customerData->email,
        ));

        return $this;
    }
}
