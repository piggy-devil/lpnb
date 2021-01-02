<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\Buyer\BuyerController;
use App\Http\Controllers\API\Seller\SellerController;
use App\Http\Controllers\API\Product\ProductController;
use App\Http\Controllers\API\Category\CategoryController;
use App\Http\Controllers\API\Transaction\TransactionController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * Buyers
 */
Route::resource('buyers', BuyerController::class)->only(['index', 'show']);

/**
 * Categories
 */
Route::resource('categories', CategoryController::class)->except(['create', 'edit']);

/**
 * Products
 */
Route::resource('products', ProductController::class)->only(['index', 'show']);

/**
 * Sellers
 */
Route::resource('sellers', SellerController::class)->only(['index', 'show']);

/**
 * Transactions
 */
Route::resource('transactions', TransactionController::class)->only(['index', 'show']);

/**
 * Users
 */
Route::resource('users', UserController::class)->except(['create', 'edit']);
