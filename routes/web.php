<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

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
$data_uri="/";
if (!empty($_SERVER['REQUEST_URI'])) {
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    
    switch ($uri_segments[1]) {
        case 'login':
            $data_uri="login";
            break;
        default:
             $data_uri="/";
            break;
           
    }
}

Auth::routes();
Route::get("/home", [HomeController::class, 'index'])->name('home');
Route::post("/dologin",[LoginController::class,'dologin'])->name("login");
Route::get($data_uri,[LoginController::class,'showLoginForm'])->name("showlogin");
Route::get('/logout',[LoginController::class,'logout'])->name("logout");


Route::get('/detail/{id}',[HomeController::class,'detail'])->name("detail");
Route::get('/delete/{id}',[HomeController::class,'delete'])->name("delete");


    Route::post('/doinsert',[HomeController::class,'doinsert'])->name("doinsert");

    Route::get('/insert',[HomeController::class,'insert'])->name("insert");

