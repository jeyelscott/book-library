<?php

declare(strict_types=1);

namespace Domains\Customer\Actions;

use Domains\Customer\DataTransferObjects\CustomerData;
use Domains\Customer\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * CreateCustomerAction
 */
class CreateCustomerAction
{
    public function execute(CustomerData $customerData): Customer
    {
        $customer = Customer::create([
            'name' => $customerData->name,
            'gender' => $customerData->gender,
            'date_of_birth' => $customerData->date_of_birth,
            'address' => $customerData->address,
            'contact_number' => $customerData->contact_number,
            'email' => $customerData->email,
            'password' => Hash::make(Str::random(16)),
            'verification_token' => Str::random(16),
            'verification_token_expires_at' => date('Y-m-d H:i:s', strtotime('+2 days')),
        ]);

        return $customer;
    }
}
