<?php

use App\Http\Controllers\FinanceController;
use App\Http\Controllers\HeadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('finance', FinanceController::class);
Route::get('/finance/create/{name}', [FinanceController::class, 'create'])->name('finance.create');
Route::get('/finance/head/{name}', [FinanceController::class, 'head'])->name('finance.head');
Route::resource('head', HeadController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
