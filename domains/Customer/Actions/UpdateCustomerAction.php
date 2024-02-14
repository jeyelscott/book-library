<?php

declare(strict_types=1);

namespace Domains\Customer\Actions;

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
        $customer->update([
            'name' => $customerData->name,
            'gender' => $customerData->gender,
            'date_of_birth' => $customerData->date_of_birth,
            'address' => $customerData->address,
            'contact_number' => $customerData->contact_number,
            'email' => $customerData->email,
        ]);

        return $customer;
    }
}
