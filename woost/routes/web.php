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
    return view('auth.login');
})->name('login');

Route::get('register', function () {
    return view('auth.register');
})->name('register');

Route::prefix('admin')->group(function () {  // ->middleware('access.administration')

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Route vers controller édition d'un utilisateur
    Route::get('/user/{userId}',
        [\App\Http\Controllers\UserController::class, 'find'])
        ->name('admin.control_user');

    // Route vers la vue édition des articles
    Route::get('/edit-user', function () {
        return view('admin.edit_user');
    })->name('admin.edit_user');

});
