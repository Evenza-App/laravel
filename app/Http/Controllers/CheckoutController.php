<?php

namespace App\Http\Controllers;

use App\Helpers\StripeHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stripe\Exception\CardException;

class CheckoutController extends Controller
{
    public function store(StripeHelper $stripeHelper, Request $request)
    {
        try {
            $confirmation_number = Str::uuid();
            $user = auth()->user() ?? new User;

            $stripeHelper->charge($user, $request, $confirmation_number);

            // add the rest of the logic here

            return response()->noContent();
        } catch (CardException $e) {
            return response([
                'errors' => $e->getMessage(),
            ], 500);
        } catch (\Error $e) {
            return response([
                'errors' => $e->getMessage(),
            ], 500);
        }
    }
}
