<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
Route::get('/item/{item_id}', [ItemController::class, 'show'])->name('item.show');
Route::get('/reply/like/{id}', [ItemController::class, 'like'])->name('reply.like');
Route::get('/reply/unlike/{id}', [ItemController::class, 'unlike'])->name('reply.unlike');
Route::post('/posts/comment', [ItemController::class, 'reply']);

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/purchase/{item_id}', [PurchaseController::class, 'index'])->name('purchase.index');
    Route::post('/purchase/ajax', [PurchaseController::class, 'ajax'])->name('purchase.ajax');
    Route::post('/purchase/store/{item_id}', [PurchaseController::class, 'charge'])->name('purchase.store');
    
    Route::get('/purchase/address/{item_id}', [AddressController::class, 'index'])->name('address.index');
    Route::post('/purchase/{item_id}', [AddressController::class, 'upsert'])->name('address.upsert');

    Route::get('/mypage', [MypageController::class, 'mix_index'])->name('mypage.index');

    Route::get('/mypage/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/mypage', [ProfileController::class, 'upsert']);

    Route::get('/sell', [SellController::class, 'index'])->name('sell.index');
    Route::post('/', [SellController::class, 'create']); 
});

Route::get('/email/verify', function () {
    return view('auth.email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/mypage/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back();
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');