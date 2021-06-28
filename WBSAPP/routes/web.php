<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User_test;
use App\Http\Controllers\EntranceController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/testrole', [User_test::class, 'addSPRole']);
Route::get('/testuser', [User_test::class, 'addUser']);

Route::get('/', [EntranceController::class, 'Login_index'])->name('login.index');

Route::post('/', [EntranceController::class, 'Login_submit'])->name('login.submit');
Route::get('/register', [EntranceController::class, 'Regist_index'])->name('register.index');
Route::post('/register', [EntranceController::class, 'Regist_submit'])->name('register.submit');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
