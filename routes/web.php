<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserInfoController;

Route::get('/', [UserInfoController::class, 'index'])->name('users.index');
Route::get('/create', [UserInfoController::class, 'create'])->name('users.create');
Route::post('/store', [UserInfoController::class, 'store'])->name('users.store');
Route::get('/edit/{id}', [UserInfoController::class, 'edit'])->name('users.edit');
Route::put('/update/{id}', [UserInfoController::class, 'update'])->name('users.update');
Route::delete('/delete/{id}', [UserInfoController::class, 'destroy'])->name('users.destroy');
