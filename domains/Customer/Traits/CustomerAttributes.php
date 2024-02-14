<?php

declare(strict_types=1);

namespace Domains\Customer\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait CustomerAttributes
{
    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value, array $attributes): string => $attributes['status'] ? 'active' : 'inactive'
        );
    }
}
