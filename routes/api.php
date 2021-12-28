<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SignUpController;
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

Route::post('/signup', [SignUpController::class, 'signup']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout',  [LoginController::class, 'logout'])->middleware('auth:sanctum');


Route::resource('products', ProductsController::class);
Route::get('products-for-sale', [ProductsController::class, 'productsForSale']);


Route::post('change-order-status', [OrdersController::class, 'changeOrderStatus']);
Route::get('order-deliveries', [OrdersController::class, 'deliveredOrders']);
Route::get('new-orders-count', [OrdersController::class, 'newOrdersCount']);
Route::get('my-orders/{id}', [OrdersController::class, 'myOrders']);
Route::resource('orders', OrdersController::class);