<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PostController;
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
Route::get('/student/index', [StudentController:: Class ,'index']);

Route::get('/student/create', [StudentController:: Class ,'create']);
Route::post('/student/store', [StudentController:: Class ,'store']);


Route::get('/create', [BlogController:: Class ,'create']);
Route::post('/blog/store', [BlogController:: Class ,'store']);

//resource controller
Route::Resource('Post',PostController:: Class);

//
Route::get('/blog/delete/{id}',[BlogController :: Class ,'delete'])->middleware('admincheck');