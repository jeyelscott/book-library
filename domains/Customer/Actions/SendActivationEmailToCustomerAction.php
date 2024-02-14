<?php

declare(strict_types=1);

namespace Domains\Customer\Actions;

use Domains\Customer\Models\Customer;
use Domains\Customer\Notifications\CustomerAccountActivationNotification;

/**
 * SendActivationEmailToCustomerAction
 */
class SendActivationEmailToCustomerAction
{
    public function execute(Customer $customer): void
    {
        $customer->notify(new CustomerAccountActivationNotification($customer));
    }
}
