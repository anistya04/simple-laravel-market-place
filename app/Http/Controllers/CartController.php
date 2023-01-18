<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(AddToCartRequest $request)
    {
        $cart = Cart::where('user_id', $request->user()->id)
            ->where('product_id', $request->product_id)
            ->first();
        DB::beginTransaction();

        if ($cart) {
            $overstock = $request->quantity + $cart->quantity > $cart->product->stock;
            if ($overstock) {
                return response()->json([
                    'message' => 'Failed add to cart, overstock',
                ], 400);
            }

            $cart->quantity = $cart->quantity + $request->quantity;
            $cart->save();
        } else {
            $cart = Cart::create([
                'user_id' => $request->user()->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        DB::commit();

        return response()->json([
            'message' => 'Success add to cart',
            'data' => $cart
        ], 200);
    }
}
