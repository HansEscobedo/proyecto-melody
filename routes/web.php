<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Resources\Views;


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

Route::get('/', function () {
    return view('auth.login');
})->name('login');
//Login routes

Route::post('/', [LoginController::class, 'store']);

Route::get('/test', function () {
    return view('layouts.dashboard');
})->name('test');

Route::get('registerCustomer',[RegisterController::class,'index'])->name('registerCustomer');
Route::post('/registerCustomer',[RegisterController::class, 'store']);

Route::get('welcome',[RegisterController::class,'back'])->name('welcome');





