<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Frontend Routes
Route::get('/', function () {
    return view('frontend.welcome');
});
Route::get('news', [IndexController::class, 'news']);

//Backend Routes
Route::get('admin', [AdminController::class, 'index']);
Route::get('orders', [AdminController::class, 'orders']);
Route::get('chat', [AdminController::class, 'chat']);
Route::get('workers', [AdminController::class, 'workers']);
Route::get('customers', [AdminController::class, 'customers']);
Route::get('mpesa', [AdminController::class, 'mpesa']);
Route::get('cash', [AdminController::class, 'cash']);
Route::get('cinvoice', [AdminController::class, 'cinvoice']);
Route::get('minvoice', [AdminController::class, 'minvoice']);
Route::get('oinvoice/{id}', [AdminController::class, 'oinvoice']);
Route::get('cProfile/{id}', [AdminController::class, 'cProfile']);
Route::get('wProfile/{id}', [AdminController::class, 'wProfile']);
Route::get('profile', [AdminController::class, 'profile']);
Route::get('items', [AdminController::class, 'items']);
Route::get('acceptOrder', [AdminController::class, 'acceptOrder']);
Route::post('addStock', [AdminController::class, 'addStock']);
Route::post('addWorker', [AdminController::class, 'addWorker']);
Route::post('addCustomer', [AdminController::class, 'addCustomer']);
Route::post('addCorder', [AdminController::class, 'addCorder']);
Route::get('editStock', [AdminController::class, 'editStock']);
Route::get('sell', [AdminController::class, 'sell']);
Route::get('scroll', [AdminController::class, 'scroll']);
Route::get('getUserDetail', [AdminController::class, 'getUserDetail']);
Route::get('getTotal', [AdminController::class, 'getTotal']);
Route::get('newBal', [AdminController::class, 'newBal']);
Route::get('newTotal', [AdminController::class, 'newTotal']);
Route::get('newDynamicBal', [AdminController::class, 'newDynamicBal']);
Route::get('editWorker', [AdminController::class, 'editWorker']);
Route::get('editOrder', [AdminController::class, 'editOrder']);
Route::post('eWorker', [AdminController::class, 'eWorker']);
Route::post('eCustomer', [AdminController::class, 'eCustomer']);
Route::post('eStock', [AdminController::class, 'eStock']);
Route::post('selling', [AdminController::class, 'selling']);
Route::post('cancelOrder', [AdminController::class, 'cancelOrder']);
Route::post('eOrder', [AdminController::class, 'eOrder']);

