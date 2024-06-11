<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemInController;
use App\Http\Controllers\ItemOutController;
use App\Models\Category;
use App\Models\Item;
use App\Models\ItemIn;
use App\Models\ItemOut;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return inertia('Index', [
            'categoriesCount' => Category::all()->count(),
            'itemsCount' => Item::all()->count(),
            'itemInsCount' => ItemIn::all()->count(),
            'itemOutsCount' => ItemOut::all()->count(),
        ]);
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:web');

    Route::resource('/category', CategoryController::class);
    Route::resource('/item', ItemController::class);
    Route::resource('/item-in', ItemInController::class);
    Route::resource('/item-out', ItemOutController::class);
});
