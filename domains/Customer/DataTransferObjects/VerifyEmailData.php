<?php

declare(strict_types=1);

namespace Domains\Customer\DataTransferObjects;

/**
 * CustomerData
 */
class VerifyEmailData
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {
    }

    /**
     * fromArray
     *
     * @param  mixed  $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'],
            password: $data['password'],
        );
    }
}
