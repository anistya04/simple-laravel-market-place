<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::get();

        return response()->json([
            'message' => 'Success get all payment methods',
            'data' => $paymentMethods
        ], 200);
    }
}
