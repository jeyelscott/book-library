<?php

declare(strict_types=1);

namespace Domains\Customer\Projectors;

use Domains\Customer\Events\CustomerCreated;
use Domains\Customer\Models\Customer;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class CustomerProjector extends Projector
{
    public function onCustomerCreated(CustomerCreated $event)
    {
        Customer::new()
            ->writeable()
            ->create([
                'uuid' => $event->uuid,
                'name' => $event->name,
                'gender' => $event->gender,
                'date_of_birth' => $event->date_of_birth,
                'address' => $event->address,
                'contact_number' => $event->contact_number,
                'email' => $event->email,
                'password' => $event->password,
                'verification_token' => $event->verification_token,
                'verification_token_expires_at' => $event->verification_token_expires_at,
            ]);
    }
}
