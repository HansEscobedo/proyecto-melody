<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ConcertController;

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
///Prueba
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);

Route::post('/logout', [LogoutController::class,'store'])->name('logout');

Route::get('/dashboard', [ConcertController::class, 'index'])->name('dashboard');
Route::get('createConcert', [ConcertController::class, 'create'])->name('create_concert');
Route::post('createConcert', [ConcertController::class, 'store'])->name('createConcert');
