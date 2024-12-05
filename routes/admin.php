<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\OptionController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified', 'verifyRole:admin']], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin-home');

    Route::get('/links', [LinkController::class, 'links'])->name('all-links');

    Route::post('/link/add', [LinkController::class, 'addLink'])->name('add-link');

    Route::delete('/link/delete/{link}', [LinkController::class, 'deleteLink'])->name('delete-link');

    Route::get('/customers', [AdminController::class, 'AllUsers'])->name('all-users');

    Route::post('/user/ban/{user}', [AdminController::class, 'ban'])->name('ban-user');

    Route::post('/user/unban/{user}', [AdminController::class, 'unban'])->name('unban-user');

    Route::delete('/delete-user/{user}', [AdminController::class, 'deleteUser'])->name('delete-user');

    Route::get('/options', [OptionController::class, 'Options'])->name('all-options');
    Route::post('/options/save', [OptionController::class, 'saveOptions'])->name('save-options');

    Route::get('/adminUsers', [AdminController::class, 'allAdmins'])->name('all-admins');

    Route::get('/signup', [AdminController::class, 'addAdmin'])->name('add-admin');

    Route::get('/edit-admin/{user}', [AdminController::class, 'editAdmin'])->name('edit-admin');

    Route::delete('/delete-admin/{user}', [AdminController::class, 'deleteAdmin'])->name('delete-admin');
});
