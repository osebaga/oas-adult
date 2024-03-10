<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mailer\Transport\Smtp\Auth\LoginAuthenticator;

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
    return view('users.login');
});

Route::prefix('/oas')->group(function(){
    Route::match(['get','post'],'login',[AuthController::class,'login'])->name('login');
    Route::match(['get','post'],'register',[AuthController::class,'create_user'])->name('user.register');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');


    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashbaord');
    
})->middleware(['auth'],['verified'])->name('dashboard');
