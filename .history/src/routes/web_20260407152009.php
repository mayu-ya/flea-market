<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellController;

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

Route::get('/', [ItemController::class, 'mix_index'])->name('index.index');
Route::get('/search', [ItemController::class, 'search'])->name('index.seach');
Route::get('/item/{item_id}', [ItemController::class, 'show'])->name('item.show');
Route::get('/reply/like/{id}', [ItemController::class, 'like'])->name('reply.like');
Route::get('/reply/unlike/{id}', [ItemController::class, 'unlike'])->name('reply.unlike');

Route::get('/purchase/{item_id}', [PurchaseController::class, 'index'])->name('purchase.index');
Route::post('/purchase/ajax', [PurchaseController::class, 'ajax'])->name('purchase.ajax');
Route::post('/purchase/store/{item_id}', [PurchaseController::class, 'create'])->name('purchase.store');

Route::get('/purchase/address/{item_id}', [AddressController::class, 'index'])->name('address.index');
Route::post('/purchase/{item_id}', [AddressController::class, 'upsert']);

Route::middleware('auth')->group(function () {
    Route::post('/posts/comment', [ItemController::class, 'reply']);

    Route::get('/mypage', [MypageController::class, 'mix_index'])->name('mypage.index');

    Route::get('/mypage/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/mypage', [ProfileController::class, 'upsert']);

    Route::get('/sell', [SellController::class, 'index'])->name('sell.index');
    Route::post('/', [SellController::class, 'create']);
})