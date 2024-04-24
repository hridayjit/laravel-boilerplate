<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\EventController;
// use App\Http\Controllers\PublicController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\RoleController;
// use App\Http\Controllers\PackageController;
// use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SoftwareController;
// use App\Http\Controllers\QrController;
// use App\Http\Controllers\PaymentController;
// use App\Http\Controllers\MessageController;
// use App\Http\Controllers\AddFieldController;
// use chillerlan\QRCode\QRCode;
use Illuminate\Support\Facades\Route;
// use WhatPress\Lib\WhatPress;

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
   return view('index');
});
//login
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware(['checkSessionKey'])->group(function () {
    // Your routes that require the session key to be present
    //home
    Route::get('/home', [HomeController::class, 'get'])->name('home');
    // Route::get('/home', function () {
    //     return view('home');
    // });
    //user
    Route::get('/user', function () {
        return view('user');
    })->name('user');
    Route::get('/create_user', function () {
        return view('create_user');
    })->name('create_user');
    Route::post('/getusers', [UserController::class, 'get'])->name('getusers');
    // Route::post('/user', [UserController::class, 'update'])->name('user');
    Route::post('/updateuser', [UserController::class, 'update'])->name('updateuser');
    Route::post('/createuser', [UserController::class, 'create'])->name('createuser');
    //software
    Route::get('/software', function () {
        return view('software');
    })->name('software');
    Route::post('/getsoftwares', [SoftwareController::class, 'get'])->name('getsoftwares');
    Route::post('/updatesoftware', [SoftwareController::class, 'update'])->name('updatesoftware');
    //get data in modals
    Route::post('/getroles', [RoleController::class, 'getroles'])->name('getroles');
    //delete
    Route::get('/delete', [DeleteController::class, 'delete'])->name('delete');
    //logout
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
    
});
