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

Route::get('/', [
    'uses'=>'MovieController@getMovies',
    'as'=>'movie.info'
]);
Route::get('RerouteAddreview/{id}',[
    'uses'=>'ReviewController@ReroutAddReview',
    'as'=>'review.add'
]);
Route::post('AddReview/{movieid}',[
    'uses'=>'ReviewController@AddReview',
    'as'=>'add.review'
]);
Route::get('/createMovie',function(){
    return view('createMovie');
});
Route::get('/login',function(){
    return view('login');
});
Route::post('login',[
    'uses'=>'UserController@loginUser',
    'as'=>'LogIn.info'
]);
Route::post('createmovie',[
    'uses'=>'MovieController@createMovie',
    'as'=>'movie.create'
]);
Route::post('searchMovie',[
    'uses'=>'MovieController@searchMovie',
    'as'=>'movie.get'
]);
Route::get('moviedetail/{id}',[
    'uses'=>'MovieController@infoMovie',
    'as'=>'movie.details'
]);
