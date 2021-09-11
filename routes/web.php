<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->middleware('role:'.USER.'|'.ADMIN)->group(function (){
    Route::get('/',[\App\Http\Controllers\HomeController::class,'landing'])->name('landing');
    Route::post('account-update',[\App\Http\Controllers\HomeController::class,'accountUpdate'])->name('account.update');
    Route::get('profile',[\App\Http\Controllers\HomeController::class,'profile'])->name('profile');
    Route::post('profile',[\App\Http\Controllers\HomeController::class,'updateProfile']);
    Route::get('contact',[\App\Http\Controllers\HomeController::class,'contact'])->name('contact');
    Route::get('document',[\App\Http\Controllers\HomeController::class,'document'])->name('document');
    Route::post('document',[\App\Http\Controllers\HomeController::class,'updateDocument']);
});
