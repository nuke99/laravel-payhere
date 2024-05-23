<?php

use Illuminate\Support\Facades\Route;
use Workbench\App\Http\Controllers\Checkout;
use Workbench\App\Http\Controllers\Preapproval;
use Workbench\App\Http\Controllers\Authorize;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/checkout', Checkout::class)
    ->middleware('auth')
    ->name('checkout');

Route::get('/preapproval', Preapproval::class)
    ->middleware('auth')
    ->name('preapproval');

Route::get('/authorize', Authorize::class)
    ->middleware('auth')
    ->name('authorize');
