<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/cadastro', [HomeController::class, 'cadastro'])->name('cadastro');
Route::get('/', [HomeController::class, 'index'])->name('home');

// DEFAULT AUTH ROUTES
Auth::routes();

// RESET PASSWORD

Route::get('forget-password', [ForgotPasswordController::class,'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class,'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class,'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class,'submitResetPasswordForm'])->name('reset.password.post');

// RESET PASSWORD
Route::get('/register',[LoginController::class,'showFormRegister'])->name('register');
Route::get('/login',[LoginController::class,'showFormLogin'])->name('login');

