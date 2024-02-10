<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EnsalamentController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\Admin\SelectiveProcessController as AdminSelectiveProcessController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Auth\Admin\AdminLoginController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Payment\PagSeguro;
use App\Http\Controllers\Site\IndexController as SiteIndexController;
use App\Http\Controllers\Site\LeadController;
use App\Http\Controllers\Site\SelectiveProcessController;
use App\Http\Controllers\Site\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' =>'admin'], function() {
    Route::get('login',[AdminLoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('login',[AdminLoginController::class,'login'])->name('admin.login.submit');
    Route::post('logout',[AdminLoginController::class,'logout'])->name('admin.logout');
}) ;


Route::group(['prefix' => 'admin','middleware' => 'auth:admin'],function(){
    Route::get('/', [IndexController::class,'index'])->name('admin.dashboard');
    Route::get('admin', [AdminController::class,'index'])->name('admin.admin.index');
    Route::get('admin/create', [AdminController::class, 'create'])->middleware('can:admin')->name('admin.admin.create');
    Route::post('admin/store', [AdminController::class, 'store'])->middleware('can:admin')->name('admin.admin.store');
    Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->middleware('can:admin')->name('admin.admin.edit');
    Route::get('admin/show/{id}', [AdminController::class, 'show'])->middleware('can:admin')->name('admin.admin.show');
    Route::put('admin/update/{id}', [AdminController::class, 'update'])->name('admin.admin.update');
    Route::delete('admin/destroy/{id}', [AdminController::class, 'destroy'])->middleware('can:admin')->name('admin.admin.destroy');

    Route::get('selective_process', [AdminSelectiveProcessController::class,'index'])->name('admin.selective_process.index');
    Route::get('selective_process/create', [AdminSelectiveProcessController::class, 'create'])->name('admin.selective_process.create');
    Route::post('selective_process/store', [AdminSelectiveProcessController::class, 'store'])->name('admin.selective_process.store');
    Route::get('selective_process/edit/{id}', [AdminSelectiveProcessController::class, 'edit'])->name('admin.selective_process.edit');
    Route::put('selective_process/update/{id}', [AdminSelectiveProcessController::class, 'update'])->name('admin.selective_process.update');

    // Admin password
    Route::get('admin/show-password/{id}', [AdminController::class, 'showPassword'])->name('admin.admin.show-password');
    Route::put('admin/update-password/{id}', [AdminController::class, 'updatePassword'])->name('admin.admin.update-password');

    // Ensalament
    Route::get('ensalament', [EnsalamentController::class,'index'])->name('admin.ensalament.index');
    Route::get('ensalament/create', [EnsalamentController::class, 'create'])->name('admin.ensalament.create');
    Route::post('ensalament/store', [EnsalamentController::class, 'store'])->name('admin.ensalament.store');
    Route::get('ensalament/show/{id}', [EnsalamentController::class, 'show'])->name('admin.ensalament.show');
    Route::delete('ensalament/destroy/{id}', [EnsalamentController::class, 'destroy'])->name('admin.ensalament.destroy');

    //Students
    Route::get('student', [AdminStudentController::class,'index'])->name('admin.student.index');
    Route::get('reportxls', [AdminStudentController::class,'reportxls'])->name('admin.student.reportxls');
    Route::get('reportxls-notstudent', [AdminStudentController::class,'reportxlsnotstudent'])->name('admin.student.reportxls-notstudent');
    Route::get('student/print/{student_id}/process/{selective_process_id}', [AdminStudentController::class,'print'])->name('admin.student.print');
    Route::get('student/smallprint/{student_id}/process/{selective_process_id}', [AdminStudentController::class,'smallprint'])->name('admin.student.smallprint');
    Route::get('student/makexls/{student_id}/process/{selective_process_id}', [AdminStudentController::class,'makexls'])->name('admin.student.makexls');
    Route::get('notstudent', [AdminStudentController::class,'notRegistred'])->name('admin.student.notstudent');

    Route::get('lead', [AdminLeadController::class,'index'])->name('admin.lead.index');
    Route::get('reportlead', [AdminLeadController::class,'reportlead'])->name('admin.lead.reportlead');

    // Statistic
    Route::get('statistic', [StatisticController::class,'index'])->name('admin.statistic.index');
});

// OPENED
Route::get('/', [SiteIndexController::class, 'index'])->name('home.index');
Route::get('/ensalamento', [SiteIndexController::class, 'ensalament'])->name('home.ensalament');
Route::get('/precadastro', [SiteIndexController::class, 'leads'])->name('home.leads');
Route::post('/precadastro', [LeadController::class, 'store'])->name('home.leads.post');

Route::group(['middleware' => 'auth'],function(){
    Route::get('home', [HomeController::class, 'cadastro'])->name('home');
    Route::get('cadastro', [HomeController::class,'cadastro'])->name('cadastro');
    Route::get('novocadastro', [StudentController::class,'create'])->name('student.form');

    Route::get('meucadastro/{step?}', [StudentController::class,'edit'])->name('student.form.edit');
    Route::post('student', [StudentController::class,'store'])->name('student.store');
    Route::post('student.two', [StudentController::class,'storeTwo'])->name('student.store.two');

    Route::put('student.update/{id}', [StudentController::class,'update'])->name('student.update');
    Route::put('student.update.two/{id}', [StudentController::class,'updateTwo'])->name('student.update.two');


    Route::post('selective_processes', [SelectiveProcessController::class,'store'])->name('selective_processes.store');


});

// sandbox.
Route::get('payment/pix', [PagSeguro::class, 'index'])->name('pix');
Route::get('payment/return', [PagSeguro::class, 'return'])->name('payment.return');
Route::get('payment/pix/{id}', [PagSeguro::class, 'pedido'])->name('pix');
Route::get('payment/pay/{id}', [PagSeguro::class, 'pay'])->name('payment.pay');

// routes/web.php
