<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Auth::routes();

// Category CRUD
Route::resource('category',App\Http\Controllers\admin\CategoryController::class)->middleware(['verified']);;













//Verification email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify'); 
//Verification Notice
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
// Verification resend
Route::post('/verify/resend', [App\Http\Controllers\HomeController::class, 'resend'])->name('verification.resend');


//Password Change
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'password_change'])->name('password.change');
Route::post('/password/update', [App\Http\Controllers\HomeController::class, 'password_update'])->name('update.password');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['verified']);
