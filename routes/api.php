<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\api\OutletController;

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

Route::controller(ApiController::class)->group(function(){
    Route::get('/index','index');
    
    Route::post('/register','register');
    Route::post('/login','login');
    Route::get('/logout','logout');
    
});

Route::apiResource('outlet',OutletController::class);