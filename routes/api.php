<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::middleware(["auth:api"])->group(function () {
    Route::apiResources(['book' => BookController::class]);
    Route::apiResources(['category' => CategoryController::class]);
});


