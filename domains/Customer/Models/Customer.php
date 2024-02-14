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
    use CustomerAttributes, HasFactory, Notifiable, HasApiTokens;

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
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = [
        'email_verified_at',
    ];

    /**
     * casts
     *
     * @var array
     */
    protected $casts = [
        'status',
    ];

    /**
     * newFactory
     */
    protected static function newFactory(): CustomerFactory
    {
        return new CustomerFactory();
    }
}
