<?php

use App\Http\Livewire\Dashboard\Dashboard;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', config('jetstream.auth_session'), 'verified', 'user.isAdmin',])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
