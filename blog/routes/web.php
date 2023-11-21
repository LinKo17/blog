<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\AdminController;
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
    return view('users.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// users
Route::get("/index",[RoleController::class,"index"]);

//users navbar route
Route::get("/categoriesnav",[NavbarController::class,"categoriesnav"]);
Route::get("/aboutnav",[NavbarController::class,"aboutnav"]);








//profile
Route::get("/profile/{id}",[UserController::class,"profile"]);
Route::get("/setting/{id}",[UserController::class,"setting"]);
Route::get("/createPost",[UserController::class,"createPost"]);
Route::get("/profile/edit/{id}",[UserController::class,"editPost"]);





// admin

//side section
Route::get("/dashboard",[RoleController::class,"dashboard"]);
Route::get("/categoryside",[AdminController::class,"categoryside"]);
Route::get("/userside",[AdminController::class,"userside"]);
Route::get("/createpostside",[AdminController::class,"createside"]);
Route::get("/showpostside",[AdminController::class,"showside"]);
Route::get("/commentside",[AdminController::class,"commentside"]);
Route::get("/approveside",[AdminController::class,"approveside"]);
Route::get("/reportside",[AdminController::class,"reportside"]);
Route::get("/advertiside",[AdminController::class,"advertiside"]);
Route::get("/annouside",[AdminController::class,"annouside"]);
Route::get("/settingside",[AdminController::class,"settingside"]);



//test
Route::get('/test', function () {
    return view('users.parts.setting');
});
