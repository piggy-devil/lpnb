<?php

use App\Http\Controllers\API\AuthenController;
use App\Http\Controllers\API\AutheticateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\Buyer\BuyerController;
use App\Http\Controllers\API\Seller\SellerController;
use App\Http\Controllers\API\Product\ProductController;
use App\Http\Controllers\API\Buyer\BuyerSellerController;
use App\Http\Controllers\API\Category\CategoryController;
use App\Http\Controllers\API\Buyer\BuyerProductController;
use App\Http\Controllers\API\Seller\SellerBuyerController;
use App\Http\Controllers\API\Buyer\BuyerCategoryController;
use App\Http\Controllers\API\Product\ProductBuyerController;
use App\Http\Controllers\API\Seller\SellerProductController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use App\Http\Controllers\API\Seller\SellerCategoryController;
use App\Http\Controllers\API\Buyer\BuyerTransactionController;
use App\Http\Controllers\API\Category\CategoryBuyerController;
use App\Http\Controllers\API\Category\CategorySellerController;
use App\Http\Controllers\API\Product\ProductCategoryController;
use App\Http\Controllers\API\Transaction\TransactionController;
use App\Http\Controllers\API\Category\CategoryProductController;
use App\Http\Controllers\API\Seller\SellerTransactionController;
use App\Http\Controllers\API\Product\ProductTransactionController;
use App\Http\Controllers\API\Category\CategoryTransactionController;
use App\Http\Controllers\API\Transaction\TransactionSellerController;
use App\Http\Controllers\API\Product\ProductBuyerTransactionController;
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
Route::resource('categories.buyers', CategoryBuyerController::class)->only(['index']);
Route::resource('categories.sellers', CategorySellerController::class)->only(['index']);
Route::resource('categories.products', CategoryProductController::class)->only(['index']);
Route::resource('categories.transactions', CategoryTransactionController::class)->only(['index']);

/**
 * Products
 */
Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::resource('products.buyers', ProductBuyerController::class)->only(['index']);
Route::resource('products.buyers.transactions', ProductBuyerTransactionController::class)->only(['store']);
Route::resource('products.categories', ProductCategoryController::class)->only(['index', 'update', 'destroy']);
Route::resource('products.transactions', ProductTransactionController::class)->only(['index']);

/**
 * Sellers
 */
Route::resource('sellers', SellerController::class)->only(['index', 'show']);
Route::resource('sellers.buyers', SellerBuyerController::class)->only(['index']);
Route::resource('sellers.products', SellerProductController::class)->except(['create', 'show', 'edit']);
Route::resource('sellers.categories', SellerCategoryController::class)->only(['index', 'show']);
Route::resource('sellers.transactions', SellerTransactionController::class)->only(['index', 'show']);

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
Route::get('users/verify/{token}', [UserController::class, 'verify'])->name('verify');
Route::get('users/{user}/resend', [UserController::class, 'resend'])->name('resend');
Route::get('users/me', [UserController::class, 'me'])->name('me');
Route::post('users/login', [UserController::class, 'login']);

Route::post('oauth/token', [AccessTokenController::class, 'issueToken'])->name('issueToken');

Route::resource('auths', AutheticateController::class);
Route::post('login', [AutheticateController::class, 'login'])->name('login');


// Route::post('/register', [AuthenController::class, 'register']);
// Route::post('/logout', [AuthenController::class, 'logout'])->middleware('auth:api');