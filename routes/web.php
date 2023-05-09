<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

//Route::get('/dashboard', [ConcertController::class, 'index'])->name('dashboard');
Route::get('createConcert', [ConcertController::class, 'create'])->name('concertViews.create_concert');
Route::post('createConcert', [ConcertController::class, 'store'])->name('createConcert');
