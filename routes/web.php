<?php

use App\Http\Controllers\Absen;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAccount;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/sign-in", [AuthAccount::class,'index'])->name("login");
Route::post("login/save", [AuthAccount::class, 'loginIndex'])->name("login.save");

// Dashboard Main

Route::get("/main", function() {
  return view("dashboard/main");
});

// Absen

Route::get("/absen", [Absen::class, "index"]);

// User
Route::get("/user", [Users::class, "index"]);
Route::post("create-user", [Users::class, "createAccount"])->name("user.create");
