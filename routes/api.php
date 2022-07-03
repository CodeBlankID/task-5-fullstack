<?php

use App\Http\Controllers\api\v1\LoginController;

use Illuminate\Http\Request;
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
Route::post('/login',[LoginController::class,'login']);

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/all', [LoginController::class,'users']);
    Route::put('/update', [LoginController::class,'put']);
    Route::delete('/delete', [LoginController::class,'delete']);
});
