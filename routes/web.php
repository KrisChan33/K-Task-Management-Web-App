<?php

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
    return view('welcome');
});

Route::get('login', function () {
    return redirect('admin/login');
})->name('login');

Route::get('register', function () {
    return redirect('admin/register');
})->name('register');

Route::get('/home', function () {
    return view('welcome');
});

// Route::post('password/reset')->name('filament.K-Task-Management-Sys.auth.password-reset.update');