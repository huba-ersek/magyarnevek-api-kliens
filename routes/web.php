<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NameController;

Route::get('/', function () {
    return view('index');
})->name('/');

Route::get('/names', [NameController::class, 'index'])->name('names');
Route::get('/names/{name}', [NameController::class, 'show'])->name('names.show');
