<?php

use App\Http\Controllers\midtranscontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [midtranscontroller::class, 'index']);
Route::get('/payment', [midtranscontroller::class, 'payment']);
Route::post('/payment', [midtranscontroller::class, 'payment_post']);

