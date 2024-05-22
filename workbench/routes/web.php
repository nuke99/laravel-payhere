<?php

use Illuminate\Support\Facades\Route;
use Workbench\App\Http\Controllers\Checkout;

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

Route::get('/checkout', fn() => 'Redirecting to PayHere...')
    ->middleware('auth')
    ->name('checkout');
