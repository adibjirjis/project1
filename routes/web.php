<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Models\Transaction;
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

Route::get('/', function () {
    $transactions = \App\Models\Transaction::with('category')->latest()->get();
    return view('home', compact('transactions'));
})->name('home');


Route::get('/register', fn() => view('auth.register'))->name('register.page');
Route::get('/login', fn() => view('auth.login'))->name('login.page');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', function () {
    $transactions = Transaction::with('category')->latest()->get();
    return view('home', compact('transactions'));
})->middleware('auth')->name('home');

Route::resource('categories', CategoryController::class);
