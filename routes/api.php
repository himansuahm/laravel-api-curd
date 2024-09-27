<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;

Route::resource('customers', CustomersController::class);