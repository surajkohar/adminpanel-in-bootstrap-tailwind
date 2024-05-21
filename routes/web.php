<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/hotel', function () {
    return view('home');
})->name('hotel');
Route::get('/flight', function () {
    return view('flight');
})->name('flight');


Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
     Route::resource('/permissions', PermissionController::class);