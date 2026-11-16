<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NameController;

Route::get('/', function () {
    return view('index');
})->name('/');

Route::get('/names', [NameController::class, 'index'])->name('names');
