<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('customer', CustomerController::class);

Route::get('/customer-trash',[CustomerController::class,'trashIndex'])->name('customer.trash');

Route::get('/customer-restore/{customer}',[CustomerController::class,'restore'])->name('customer.restore');

Route::delete('/customer-delete/{customer}',[CustomerController::class,'delete'])->name('customer.delete');
