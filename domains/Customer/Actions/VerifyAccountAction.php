<?php

declare(strict_types=1);

namespace Domains\Customer\Actions;

use Domains\Customer\DataTransferObjects\VerifyEmailData;
use Domains\Customer\Models\Customer;
use Illuminate\Support\Facades\Hash;

class VerifyAccountAction
{
    public static function execute(Customer $customer, VerifyEmailData $verifyEmailData): Customer
    {
        $customer->update([
            'password' => Hash::make($verifyEmailData->password),
            'verification_token' => null,
            'verification_token_expires_at' => null,
            'email_verified_at' => now()
        ]);

        return $customer;
    }
}
