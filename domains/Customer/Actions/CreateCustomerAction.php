<?php

declare(strict_types=1);

namespace Domains\Customer\Actions;

use Domains\Customer\CustomerAggregateRoot;
use Domains\Customer\DataTransferObjects\CustomerData;
use Domains\Customer\Models\Customer;

/**
 * CreateCustomerAction
 */
class CreateCustomerAction
{
    /**
     * execute
     */
    public function execute(CustomerData $customerData): Customer
    {
        CustomerAggregateRoot::retrieve($customerData->uuid)
            ->createCustomer($customerData)
            ->persist();

        return Customer::where('uuid', $customerData->uuid)->first();
    }
}
