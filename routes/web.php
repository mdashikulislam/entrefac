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
    Route::post('contact',[\App\Http\Controllers\HomeController::class,'updateContact']);
    Route::get('document',[\App\Http\Controllers\HomeController::class,'document'])->name('document');
    Route::post('document',[\App\Http\Controllers\HomeController::class,'updateDocument']);
});
Route::middleware('auth')->middleware('role:'.ADMIN)->group(function (){
    Route::get('users',[\App\Http\Controllers\HomeController::class,'userList'])->name('user');
    Route::get('entrepreneurs',[\App\Http\Controllers\HomeController::class,'entrepreneurs'])->name('entrepreneurs');
    Route::get('account/change_status/{id}/{status}',[\App\Http\Controllers\HomeController::class,'accountStatusChange'])->name('account.status.change');
    Route::get('profile/{id}',[\App\Http\Controllers\HomeController::class,'profileSingle'])->name('profile.single');
    Route::get('payments',[\App\Http\Controllers\HomeController::class,'donor'])->name('donor');
    Route::get('setting',[\App\Http\Controllers\HomeController::class,'setting'])->name('setting');
    Route::post('add-admin',[\App\Http\Controllers\HomeController::class,'addAdmin'])->name('add.admin');
});
Route::middleware('auth')->middleware('role:'.USER)->group(function (){
    Route::get('payment',[\App\Http\Controllers\HomeController::class,'donate'])->name('donate');
    Route::get('my-profile',[\App\Http\Controllers\HomeController::class,'myProfile'])->name('my.profile');
    Route::get('referral',[\App\Http\Controllers\HomeController::class,'referral'])->name('referral');
});

Route::post('payment',[\App\Http\Controllers\AjaxController::class,'payment'])->name('payment');
