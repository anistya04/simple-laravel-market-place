<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//user 
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class, 'register']);
// Route::post('email/verification-notification', [VerifyEmailController::class, 'sendVerificationEmail'])->middleware('auth:api');
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])->name('verification.verify');

//products
Route::get('products', [ProductController::class, 'index'])
    ->middleware('auth:api', 'verified');

// payment methods
Route::get('payment-methods', [PaymentMethodController::class, 'index'])
    ->middleware('auth:api');

// cart
Route::post('add-to-cart', [CartController::class, 'addToCart'])
    ->middleware('auth:api', 'verified');

Route::post('checkout', [CheckoutController::class, 'create'])
    ->middleware('auth:api', 'verified');
