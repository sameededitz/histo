<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Api\VerifyController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\OptionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('api.login');

    Route::post('/signup', [AuthController::class, 'signup'])->name('api.login');

    Route::post('/reset-password', [VerifyController::class, 'sendResetLink'])->name('api.reset.password');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');

    Route::get('/chats', [ChatController::class, 'chats'])->name('api.chats');
    Route::post('/chats', [ChatController::class, 'store'])->name('api.chats.store');

    Route::post('/purchase', [PurchaseController::class, 'addPurchase'])->name('api.add.purchase');

    Route::post('/purchase/status', [PurchaseController::class, 'Status'])->name('api.purchase');

    Route::prefix('/folders')->group(function () {
        Route::get('/', [FolderController::class, 'folders']);
        Route::post('/create', [FolderController::class, 'create']);
        Route::put('/{folder}', [FolderController::class, 'update']);
        Route::delete('/{folder}', [FolderController::class, 'delete']);
        Route::post('/{folder}/messages', [FolderController::class, 'addMessage']);
        Route::delete('/{folder}/messages/{message}', [FolderController::class, 'removeMessage']);
    });
});

Route::post('/email/resend-verification', [VerifyController::class, 'resendVerify'])->name('api.verify.resend');

Route::get('/options', [OptionController::class, 'getOptions'])->name('api.options');
