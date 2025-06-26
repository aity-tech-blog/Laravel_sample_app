<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;


// テンプレートをview関数で指定する。
Route::get('/', [HelloController::class, 'index']);
// ユーザー情報を表示するルート
Route::get('/user', [UserController::class, 'user_search'])->name('user');

// お問い合わせ関連のルート
// Route::get('/contact', [ContactController::class, 'form'])->name('contact.form');
Route::match(['get', 'post'], '/contact', [ContactController::class, 'form'])->name('contact.form');
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
