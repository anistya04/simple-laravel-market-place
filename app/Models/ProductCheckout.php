<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCheckout extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'checkout_id',
        'quantity',
    ];
}
