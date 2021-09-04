<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Connection;

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

// -------
// General
// -------

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/palette-community', function () {
    return view('palette.index');
})->name('palette-community');

Route::get('/creator', function () {
    return view('creator');
})->name('creator');

// -------
// Auth
// -------

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/logout', function () {
    //
})->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// -------
// DB Connection Test Route + Laravel Welcome Blade Page
// -------

Route::get('/laravel', function () {
    // Test database connection
    try {
        DB::connection()->getPdo();
        echo "Connected successfully to: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        die("Could not connect to the database. Please check your configuration. error:" . $e );
    }

    return view('welcome');
});
