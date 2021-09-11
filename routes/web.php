<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Connection;

use App\Http\Controllers\PaletteCommunityController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

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

// example of implementing middleware inside controller ('auth')
Route::get('/palette-community', [PaletteCommunityController::class, 'index'])->name('palette-community');
Route::get('/creator', function () {
    return view('creator');
})
->name('creator');
// ->middleware('auth');

// -------
// Auth
// -------
Route::resource('register', RegisterController::class);

// example of implementing middleware inline ('guest')
// so only unauthenticated users that can visit login page
Route::name('login')
->get('/login', [LoginController::class, 'index'])
->middleware('guest');

Route::name('login')
->post('/login', [LoginController::class, 'store'])
->middleware('guest');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

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
