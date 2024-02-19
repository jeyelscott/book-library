<?php

declare(strict_types=1);

namespace Domains\Customer\Models;

use Database\Factories\CustomerFactory;
use Domains\Customer\Traits\CustomerAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Customer
 */
class Customer extends Authenticatable
{
    use CustomerAttributes, HasApiTokens, HasFactory, Notifiable;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'gender',
        'date_of_birth',
        'address',
        'contact_number',
        'email',
        'password',
        'email_verified_at',
        'status',
        'verification_token',
        'verification_token_expires_at',
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = [
        'email_verified_at',
        'verification_token_expires_at',
    ];

    /**
     * casts
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
        'password' => 'hashed',
    ];

    /**
     * newFactory
     */
    protected static function newFactory(): CustomerFactory
    {
        return new CustomerFactory();
    }
}
