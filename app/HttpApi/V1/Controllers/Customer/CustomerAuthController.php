<?php

declare(strict_types=1);

namespace App\HttpApi\V1\Controllers\Customer;

use App\Http\Controllers\Controller;
use Domains\Customer\Models\Customer;
use Domains\Customer\Requests\LoginRequest;
use Domains\Customer\Resources\CustomerResource;
use Illuminate\Support\Facades\Auth;

/**
 * CustomerAuthController
 */
class CustomerAuthController extends Controller
{
    /**
     * login
     *
     * @param  mixed  $request
     * @return void
     */
    public function login(LoginRequest $request)
    {
        $customer = Customer::where('email', $request->email)->first();

        if (! Auth::attempt()) {

            return response()->json([
                'message' => 'You have been successfully logged in.',
                'data' => [
                    'token' => $customer->createToken('api-token')->plainTextToken,
                    'customer' => CustomerResource::make($customer),
                ],
            ]);
        }
    }
}
