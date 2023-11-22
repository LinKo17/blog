<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;//role
use App\Http\Controllers\UserController;//profile
use App\Http\Controllers\NavbarController;//user navbar
use App\Http\Controllers\AdminController;//admin controller
use App\Http\Controllers\SiderController;//admin sider controller
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// users
Route::get("/index",[RoleController::class,"index"]);
Route::get("/",[RoleController::class,"index"]);

//users navbar route
Route::get("/categoriesnav",[NavbarController::class,"categoriesnav"]);
Route::get("/aboutnav",[NavbarController::class,"aboutnav"]);








//profile
Route::get("/profile",[UserController::class,"profile"]);
Route::get("/setting",[UserController::class,"setting"]);
Route::get("/createPost",[UserController::class,"createPost"]);
Route::get("/profile/edit/{id}",[UserController::class,"editPost"]);

// user setting section
Route::post("setting/pfImg",[UserController::class,"settingImg"]);
Route::post("setting/bio",[UserController::class,"settingBio"]);
Route::post("setting/date_of_birth",[UserController::class,"birthDate"]);
Route::post("setting/edu",[UserController::class,"settingEdu"]);
Route::post("setting/workAt",[UserController::class,"settingWorkAt"]);
Route::post("setting/live",[UserController::class,"settinglive"]);
Route::get("setting/emailClose/{id}",[UserController::class,"settingClose"]);
Route::get("setting/emailOpen/{id}",[UserController::class,"settingOpen"]);



// admin

//side section
Route::get("/dashboard",[RoleController::class,"dashboard"]);
Route::get("/categoryside",[SiderController::class,"categoryside"]);
Route::get("/userside",[SiderController::class,"userside"]);
Route::get("/createpostside",[SiderController::class,"createside"]);
Route::get("/showpostside",[SiderController::class,"showside"]);
Route::get("/commentside",[SiderController::class,"commentside"]);
Route::get("/approveside",[SiderController::class,"approveside"]);
Route::get("/reportside",[SiderController::class,"reportside"]);
Route::get("/advertiside",[SiderController::class,"advertiside"]);
Route::get("/annouside",[SiderController::class,"annouside"]);
Route::get("/settingside",[SiderController::class,"settingside"]);

//admin management section


//category section
Route::post("/categoryside",[AdminController::class,"category"]);
Route::get("/categories/delete/{id}",[AdminController::class,"categoryDelete"]);

//advertisement section
Route::post("/advertiside",[AdminController::class,"adverAdd"]);
Route::get("/advertisements/delete/{id}",[AdminController::class,"adverDelete"]);

//admin setting
Route::post("/settingside",[AdminController::class,"settingmanagement"]);
