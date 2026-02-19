<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('transactions.index');
});

Route::resource('transactions', TransactionController::class);
