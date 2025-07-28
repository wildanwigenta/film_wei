<?php

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
    $data['navbar'] = "home";
    return view('index',$data);
});


Route::get('/popular',[App\Http\Controllers\Pagination::class,'popular']);
Route::get('/popular/{page}',[App\Http\Controllers\Pagination::class,'popular']);


Route::get('/top_rated',[App\Http\Controllers\Pagination::class,'top_rated']);
Route::get('/top_rated/{page}',[App\Http\Controllers\Pagination::class,'top_rated']);

Route::get('/now_playing',[App\Http\Controllers\Pagination::class,'now_playing']);
Route::get('/now_playing/{page}',[App\Http\Controllers\Pagination::class,'now_playing']);


Route::get('/search',[App\Http\Controllers\Search::class,'index']);
// Route::post('/search/{page}',[App\Http\Controllers\Search::class,'index']);
