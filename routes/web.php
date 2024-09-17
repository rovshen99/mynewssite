<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/profile/password', [UserController::class, 'changePassword'])->name('changePassword');
Route::post('/profile/news', [UserController::class, 'addNews'])->name('addNews');

Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    
    Route::get('admin/news', [NewsController::class, 'adminIndex'])->name('admin.news.index');
    Route::get('admin/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('admin/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('admin/news/{id}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::get('admin/news/{id}', [NewsController::class, 'show'])->name('admin.news.show');
    Route::put('admin/news/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('admin/news/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::get('admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::put('admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});
