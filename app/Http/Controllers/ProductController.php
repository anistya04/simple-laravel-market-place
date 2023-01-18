<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return response()->json([
            'message' => 'Success get all products',
            'data' => $products
        ], 200);
    }
}
