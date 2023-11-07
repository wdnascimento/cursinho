<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Auth\Admin\AdminLoginController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Payment\PagSeguro;
use App\Http\Controllers\Site\IndexController as SiteIndexController;
use App\Http\Controllers\Site\SelectiveProcessController;
use App\Http\Controllers\Site\StudentController;



Auth::routes();

Route::get('forget-password', [ForgotPasswordController::class,'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class,'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class,'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class,'submitResetPasswordForm'])->name('reset.password.post');

Route::get('register',[LoginController::class,'showFormRegister'])->name('register');
Route::get('login',[LoginController::class,'showFormLogin'])->name('login');

// -----------------------------------
// ----------ROUTES ADMIN ------------
// -----------------------------------

Route::prefix('admin')->group(function() {
    Route::get('login',[AdminLoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('login',[AdminLoginController::class,'login'])->name('admin.login.submit');
    Route::post('logout',[AdminLoginController::class,'logout'])->name('admin.logout');
}) ;

Route::group(['prefix' => 'admin','middleware' => 'auth:admin'],function(){

    Route::get('/', [IndexController::class,'index'])->name('admin.dashboard');
    Route::get('admin', [AdminController::class,'index'])->name('admin.admin.index');
    Route::get('admin/create', [AdminController::class, 'create'])->name('admin.admin.create');
    Route::post('admin/store', [AdminController::class, 'store'])->name('admin.admin.store');
    Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.admin.edit');
    Route::get('admin/show/{id}', [AdminController::class, 'show'])->name('admin.admin.show');
    Route::put('admin/update/{id}', [AdminController::class, 'update'])->name('admin.admin.update');
    Route::delete('admin/destroy/{id}', [AdminController::class, 'destroy'])->name('admin.admin.destroy');

    // Admin password
    Route::get('admin/show-password/{id}', [AdminController::class, 'showPassword'])->name('admin.admin.show-password');
    Route::put('admin/update-password/{id}', [AdminController::class, 'updatePassword'])->name('admin.admin.update-password');

    //Students
    Route::get('student', [AdminStudentController::class,'index'])->name('admin.student.index');
    Route::get('notstudent', [AdminStudentController::class,'notRegistred'])->name('admin.student.notstudent');
});


Route::get('/', [SiteIndexController::class, 'index'])->name('home.index');

Route::group(['middleware' => 'auth'],function(){
    Route::get('home', [HomeController::class, 'cadastro'])->name('home');
    Route::get('cadastro', [HomeController::class,'cadastro'])->name('cadastro');
    Route::get('novocadastro', [StudentController::class,'create'])->name('student.form');

    Route::get('meucadastro/{step?}', [StudentController::class,'edit'])->name('student.form.edit');
    Route::post('student', [StudentController::class,'store'])->name('student.store');
    Route::post('student.two', [StudentController::class,'storeTwo'])->name('student.store.two');

    Route::put('student.update/{id}', [StudentController::class,'update'])->name('student.update');
    Route::put('student.update.two/{id}', [StudentController::class,'updateTwo'])->name('student.update.two');

    Route::get('pix', [PagSeguro::class, 'index'])->name('pix');
    Route::get('pix/{id}', [PagSeguro::class, 'pedido'])->name('pix');

    Route::post('selective_processes', [SelectiveProcessController::class,'store'])->name('selective_processes.store');
});
