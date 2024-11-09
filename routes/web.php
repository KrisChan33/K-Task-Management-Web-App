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
})->name('welcome');

// Redirect to admin login
Route::get('/admin', function () {
    return redirect('admin/login');
})->name('login');

// Redirect to admin register
Route::get('register', function () {
    return redirect('admin/register');
})->name('register');

// Example home route
Route::get('/home', function () {
    return view('home');
})->name('home');

// Route::post('password/reset')->name('filament.K-Task-Management-Web-App.auth.password-reset.update');