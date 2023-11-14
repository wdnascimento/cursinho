<?php

use App\Http\Controllers\Api\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => ['auth:admin', 'throttle:2200,1']], function () {
    Route::get('student-payment/{student_id}/process/{selective_process_id}', [StudentController::class,'studentPayment'])->name('api.student.student-payment');
    Route::post('student-payment', [StudentController::class,'store'])->name('api.student.student-payment.store');
    Route::get('get-questions', [StudentController::class,'showQuestions'])->name('api.student.get-questions');
    Route::get('student-print/{student_id}/process/{selective_process_id}', [StudentController::class,'show'])->name('api.student.student-print');
});
