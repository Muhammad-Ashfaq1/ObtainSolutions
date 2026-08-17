<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QRCodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/qr/whatsapp', [QRCodeController::class, 'whatsapp'])->name('qr.whatsapp');
Route::get('/qr/website', [QRCodeController::class, 'website'])->name('qr.website');
Route::get('/qr/custom', [QRCodeController::class, 'custom'])->name('qr.custom');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:8,1')
    ->name('contact.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminController::class, 'login'])->name('login');
        Route::post('/login', [AdminController::class, 'authenticate'])
            ->middleware('throttle:8,1')
            ->name('authenticate');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/queries', [AdminController::class, 'messages'])->name('messages');
        Route::get('/queries/{message}', [AdminController::class, 'showMessage'])->name('message.show');
        Route::post('/queries/{message}/reply', [AdminController::class, 'markAsReplied'])->name('message.reply');
        Route::delete('/queries/{message}', [AdminController::class, 'deleteMessage'])->name('message.delete');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});
