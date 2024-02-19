<?php

declare(strict_types=1);

namespace Domains\Customer\Actions;

use Domains\Customer\DataTransferObjects\VerifyEmailData;
use Domains\Customer\Models\Customer;
use Illuminate\Support\Facades\Hash;

/**
 * VerifyAccountAction
 */
class VerifyAccountAction
{
    /**
     * execute
     *
     * @param  mixed $customer
     * @param  mixed $verifyEmailData
     * @return Customer
     */
    public static function execute(Customer $customer, VerifyEmailData $verifyEmailData): Customer
    {
        $customer->update([
            'password' => Hash::make($verifyEmailData->password),
            'verification_token' => null,
            'verification_token_expires_at' => null,
            'email_verified_at' => now(),
        ]);

        return $customer;
    }
}
