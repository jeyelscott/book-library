<?php

declare(strict_types=1);

namespace Domains\Customer\Resources;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;

class CustomerResource extends JsonApiResource
{
    /**
     * toAttributes
     *
     * @param  mixed  $request
     */
    public function toAttributes(Request $request): array
    {
        return [
            'name' => $this->name,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'address' => $this->address,
            'contact_number' => $this->contact_number,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'status' => $this->status,
        ];
    }
}
