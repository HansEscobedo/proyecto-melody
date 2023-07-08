<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\VoucherController;

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
})->name('home');
//Login routes

Route::post('/', [LoginController::class, 'store']);

Route::get('/test', function () {
    return view('layouts.dashboard');
})->name('test');

// Register routes
Route::get('register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('welcome',[RegisterController::class,'back'])->name('welcome');

// Login routes
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);
Route::post('/logout', [LogoutController::class,'store'])->name('logout');

Route::get('/dashboard', [ConcertController::class, 'index'])->name('dashboard');






// Voucher

Route::get('descargar-pdf/{id}', [VoucherController::class, 'downloadPDF'])->name('pdf.descargar');
Route::get('/pdf', [VoucherController::class, 'pdf'])->name('pdf.example');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('createConcert', [ConcertController::class, 'create'])->name('create_concert');
    Route::post('createConcert', [ConcertController::class, 'store'])->name('createConcert');
    Route::get('/client', [ConcertController::class, 'clients'])->name('clients');
    Route::get('/client-search', [ConcertController::class, 'searchClient'])->name('client.search');
});

Route::middleware(['auth', 'client'])->group(function () {
    Route::get('concert-search', [ConcertController::class, 'searchDate'])->name('concert.search');
    Route::get('/detail-order/{id}', [VoucherController::class, 'generatePDF'])->name('generate.pdf');
    Route::get('/concert-list', [ConcertController::class, 'concertsList'])->name('concert.list');

    // Order Concerts
    Route::get('/concert-order/{id}', [DetailOrderController::class, 'create'])->name('concert.order');
    Route::post('/concert-order/{id}', [DetailOrderController::class, 'store'])->name('concert.order.pay');
    Route::get('/my-concerts', [ConcertController::class, 'myConcerts'])->name('client.concerts');
});
