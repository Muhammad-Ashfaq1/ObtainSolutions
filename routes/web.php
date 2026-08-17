<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// QR Code Routes
Route::get('/qr/whatsapp', [QRCodeController::class, 'whatsapp'])->name('qr.whatsapp');
Route::get('/qr/website', [QRCodeController::class, 'website'])->name('qr.website');
Route::get('/qr/custom', [QRCodeController::class, 'custom'])->name('qr.custom');

// Contact Form Route
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->name('authenticate');
    
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/messages', [AdminController::class, 'messages'])->name('messages');
        Route::get('/messages/{message}', [AdminController::class, 'showMessage'])->name('message.show');
        Route::post('/messages/{message}/reply', [AdminController::class, 'markAsReplied'])->name('message.reply');
        Route::delete('/messages/{message}', [AdminController::class, 'deleteMessage'])->name('message.delete');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});

