<?php

declare(strict_types=1);

namespace Domains\Customer\Actions;

use Domains\Customer\CustomerAggregateRoot;
use Domains\Customer\DataTransferObjects\CustomerData;
use Domains\Customer\Models\Customer;

/**
 * UpdateCustomerAction
 */
class UpdateCustomerAction
{
    /**
     * execute
     *
     * @param  mixed  $customer
     * @param  mixed  $data
     * @return void
     */
    public function execute(Customer $customer, CustomerData $customerData)
    {
        CustomerAggregateRoot::retrieve($customer->uuid)
            ->updateCustomer($customerData)
            ->persist();

        return $customer;
    }
}
