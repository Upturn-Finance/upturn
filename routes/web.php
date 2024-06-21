<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TransactionCreate;
use App\Http\Controllers\TransactionController;


Route::get('/', function () {
    return view('welcome');
});

//Route::view('/transaction/create', 'transaction.create')->name('transaction.create');

Route::get('/transaction/create', TransactionCreate::class)->name('transaction.create');
Route::post('/transaction/store', [TransactionController::class, 'store'])->name('transaction.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
