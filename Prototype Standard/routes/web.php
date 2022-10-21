<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromoController;

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
Route::get('ajouter', [PromoController::class, "AddPromotion"]);
Route::get('/edit/{id}',[PromoController::class,'Edit']);
Route::post('/update/{id}',[PromoController::class,'Update']);
Route::get('/delete/{id}',[PromoController::class,'Delete']);