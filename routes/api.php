<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Payments\ConfirmPaymentController;
use App\Http\Controllers\Payments\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [UserController::class, 'login']);
Route::get('book/indexIterator', [BookController::class, 'indexIterator']);
Route::get('book/indexModel', [BookController::class, 'indexModel']);


Route::middleware(["auth:api", "verified.user.data"])->group(function () {
    Route::apiResources(['book' => BookController::class]);
    Route::apiResources(['category' => CategoryController::class]);
    Route::get(
        'test/index',
        [\App\Http\Controllers\TestController::class, 'index']
    );
});


Route::get(
    'payment/makePayment/{system}',
    [PaymentController::class, 'createPayment']
);

Route::post(
    'payment/confirm/{system}',
    [PaymentController::class, 'confirmPayment']
);

//comment test
