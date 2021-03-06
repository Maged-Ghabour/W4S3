<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

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


Route::get('Admin/Create',[studentController::class,'Create']);
Route::get('/Login',[adminController::class,'login']);
Route::post('/DoLogin',[adminController::class,'doLogin']);
Route::get('/admin/logOut',[adminController::class,'logOut']);
