<?php

use App\Http\Controllers\Absen;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAccount;
use App\Http\Controllers\Main;
use App\Http\Controllers\Users;

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


Route::get("/sign-in", [AuthAccount::class,'index'])->name("login");
Route::post("login/save", [AuthAccount::class, 'loginIndex'])->name("login.save");
Route::get("/logout",[AuthAccount::class,"logoutSession"])->name("logout");

// Dashboard Main

Route::get("/", [Main::class,'index'])->name("main");


// Absen

Route::get("/absen", [Absen::class, "index"])->name("absen");
Route::get("/create-absen", [Absen::class, "createAbsen"])->name("absen.save");

// User
Route::get("/user", [Users::class, "index"])->name("user");
Route::post("create-user", [Users::class, "createAccount"])->name("user.create");
Route::post("/user/edit/{id}", [Users::class, "updateAccountById"])->name("user.update");
