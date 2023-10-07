<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Payment\PagSeguro;
use App\Http\Controllers\Site\StudentController;

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
Route::group(['middleware' => 'auth'],function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('cadastro', [HomeController::class,'cadastro'])->name('cadastro');
    Route::get('student', [StudentController::class,'create'])->name('student.form');
    Route::post('student', [StudentController::class,'store'])->name('student.store');
    Route::post('student.two', [StudentController::class,'storeTwo'])->name('student.store.two');

    Route::get('/pix', [PagSeguro::class, 'index'])->name('pix');
    Route::get('/pix/{id}', [PagSeguro::class, 'pedido'])->name('pix');
});


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

