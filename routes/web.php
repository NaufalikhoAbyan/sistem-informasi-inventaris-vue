<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Index');
})->name('home');
