<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\StudentsController;

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

Route::resource('promotion',PromoController::class);
Route::get('search',[PromoController::class,'search']);
Route::get('searchstudent',[StudentsController::class,'Search']);

Route::resource('student',StudentsController::class);
Route::get('student/create/{id}',[StudentsController::class,'create'])->name('student.create');
Route::get('student/edit/{id}',[StudentsController::class,'edit'])->name('student.edit');
// Route::get('apprenants/destroy/{id}',[ApprenantController::class,'destroy']);








