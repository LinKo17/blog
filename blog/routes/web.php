<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// users
Route::get("/index",[RoleController::class,"index"]);

Route::get("/profile",[UserController::class,"profile"]);





// admin
Route::get("/dashboard",[RoleController::class,"dashboard"]);

//test
Route::get('/test', function () {
    return view('users.parts.setting');
});
