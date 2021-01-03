<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\Buyer\BuyerController;
use App\Http\Controllers\API\Seller\SellerController;
use App\Http\Controllers\API\Product\ProductController;
use App\Http\Controllers\API\Buyer\BuyerSellerController;
use App\Http\Controllers\API\Category\CategoryController;
use App\Http\Controllers\API\Buyer\BuyerProductController;
use App\Http\Controllers\API\Buyer\BuyerCategoryController;
use App\Http\Controllers\API\Buyer\BuyerTransactionController;
use App\Http\Controllers\API\Category\CategorySellerController;
use App\Http\Controllers\API\Transaction\TransactionController;
use App\Http\Controllers\API\Category\CategoryProductController;
use App\Http\Controllers\API\Transaction\TransactionSellerController;
use App\Http\Controllers\API\Transaction\TransactionCategoryController;

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
Route::resource('buyers.sellers', BuyerSellerController::class)->only(['index']);
Route::resource('buyers.products', BuyerProductController::class)->only(['index']);
Route::resource('buyers.categories', BuyerCategoryController::class)->only(['index']);
Route::resource('buyers.transactions', BuyerTransactionController::class)->only(['index']);

/**
 * Categories
 */
Route::resource('categories', CategoryController::class)->except(['create', 'edit']);
Route::resource('categories.sellers', CategorySellerController::class)->only(['index']);
Route::resource('categories.products', CategoryProductController::class)->only(['index']);
Route::resource('categories.transactions', CategoryTransactionController::class)->only(['index']);

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
Route::resource('transactions.categories', TransactionCategoryController::class)->only(['index']);
Route::resource('transactions.sellers', TransactionSellerController::class)->only(['index']);

/**
 * Users
 */
Route::resource('users', UserController::class)->except(['create', 'edit']);
