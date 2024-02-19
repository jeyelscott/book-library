<?php

declare(strict_types=1);

namespace App\HttpApi\V1\Controllers\Customer;

use App\Http\Controllers\Controller;
use Domains\Customer\Actions\VerifyAccountAction;
use Domains\Customer\DataTransferObjects\VerifyEmailData;
use Domains\Customer\Models\Customer;
use Domains\Customer\Requests\LoginRequest;
use Domains\Customer\Requests\VerifyAccountRequest;
use Domains\Customer\Requests\VerifyEmailRequest;
use Domains\Customer\Resources\CustomerResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{

    public function verifyEmail(VerifyEmailRequest $request): JsonResponse
    {
        $customer = Customer::where('email', $request->email)
            ->where('verification_token', $request->verification_token)
            ->first();

        if (!$customer) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => [
                'isMatched' => true
            ]
        ], 200);
    }

    public function verifyAccount(VerifyAccountRequest $request): JsonResponse
    {
        $customer = Customer::where('email', $request->email)
            ->where('verification_token', $request->verification_token)
            ->first();

        if (!$customer) {
            throw ValidationException::withMessages([
                'email' => 'The provided credentials are incorrect.'
            ]);
        }

        DB::transaction(function () use ($request, $customer) {
            VerifyAccountAction::execute($customer, VerifyEmailData::fromArray($request->toArray()));
        });

        return response()->json([
            'status' => 'success',
            'message' => 'You have been successfully verified your account. You may now use your credentials to login.',
        ], 200);
    }
}
