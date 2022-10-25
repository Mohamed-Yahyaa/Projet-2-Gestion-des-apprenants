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

Route::get('/index',[PromoController::class, 'Display']);
Route::get('/create', [PromoController::class, 'Create']);
Route::Post('ajouter', [PromoController::class, "AddPromotion"]);
Route::get('/edit/{id}',[PromoController::class,'Edit']);
Route::post('/update/{id}',[PromoController::class,'Update']);
Route::get('/delete/{id}',[PromoController::class,'Delete']);
Route::get('search',[PromoController::class,'search']);


Route::get('/student/index',[StudentsController::class,'Display']);
Route::get('/student/create/{id}',[StudentsController::class,'create']);
Route::post('/student/ajouter',[StudentsController::class,'AddPromotion']);
Route::get('/student/edit/{id}',[StudentsController::class,'Edit']);
Route::post('/student/update/{id}',[StudentsController::class,'Update']);
Route::get('/student/delete/{id}/{idd}',[StudentsController::class,'Delete']);
