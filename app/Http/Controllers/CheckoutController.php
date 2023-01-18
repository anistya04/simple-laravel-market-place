<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCheckoutRequest;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\ProductCheckout;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function create(CreateCheckoutRequest $request)
    {
        $cartIds = $request->cart_ids;
        $this->checkCartCanbeProcessed($cartIds, $request->user()->id);

        DB::beginTransaction();

        $checkout = Checkout::create([
            'user_id' => $request->user()->id,
            'payment_method_id' => $request->payment_method_id,
            'subtotal' => 0,
        ]);

        foreach ($cartIds as $cartId) {
            $cart = Cart::find($cartId);

            ProductCheckout::create([
                'checkout_id' => $checkout->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
            ]);

            $checkout->subtotal += $cart->product->price * $cart->quantity;
            $checkout->save();

            $cart->delete();
        }

        DB::commit();

        return response()->json([
            'message' => 'Success checkout',
            'data' => $checkout
        ], 200);
    }

    public function checkCartCanbeProcessed($cartIds, $userId)
    {
        foreach ($cartIds as $cartId) {
            $cart = Cart::find($cartId)->first();

            if ($cart->user_id != $userId) {
                return response()->json([
                    'message' => 'Failed checkout, cart not belong to user',
                ], 400);
            }
            $overstock = $cart->quantity > $cart->product->stock;
            if ($overstock) {
                return response()->json([
                    'message' => 'Failed checkout, overstock',
                ], 400);
            }
        }
    }
}
