<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Connection;

use App\Http\Controllers\PaletteCommunityController;
use App\Http\Controllers\PaletteController;
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
// or you can find in laravel docs on implementing middleware in group
Route::get('/palette-community', [PaletteCommunityController::class, 'index'])->name('palette-community');
Route::get('/creator', function () {
    return view('creator');
})
->name('creator');

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
// Palette
// -------

Route::get('/palette-community/edit/{id}', [PaletteCommunityController::class, 'edit'])->name('palette-community-edit');
Route::post('/palette/create', [PaletteController::class, 'store'])->name('palette-create');
Route::put('/palette/update/{id}', [PaletteController::class, 'update'])->name('palette-update');
Route::put('/palette/restore/{id}', [PaletteController::class, 'restore'])->name('palette-restore');
Route::delete('/palette/delete/{id}', [PaletteController::class, 'destroy'])->name('palette-delete');

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
