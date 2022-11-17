<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth',[App\Http\Controllers\ApiController::class,'auth'])->name('auth');
Route::get('getpro/{id}',[App\Http\Controllers\ApiController::class,'getpro'])->name('getpro');
Route::post('timelog',[App\Http\Controllers\ApiController::class,'timelog'])->name('timelog');
Route::post('timeupdate',[App\Http\Controllers\ApiController::class,'timeupdate'])->name('timeupdate');
Route::post('sendss',[App\Http\Controllers\ApiController::class,'sendss'])->name('sendss');
Route::get('currentmonthtime/{id}',[App\Http\Controllers\ApiController::class,'currentmonthtime'])->name('currentmonthtime');
Route::get('previousmonthtime/{id}',[App\Http\Controllers\ApiController::class,'previousmonthtime'])->name('previousmonthtime');
Route::get('totalTime/{id}',[App\Http\Controllers\ApiController::class,'totalTime'])->name('totalTime');
Route::get('test/{id}',[App\Http\Controllers\ApiController::class,'test'])->name('test');
