<?php

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


Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', 'AuthController@logout');
  
    Route::get('/surveys', 'SurveyController@index');
    Route::get('/survey/{id}', 'SurveyController@show');
    Route::put('/survey/{id}', 'SurveyController@update');
    
    Route::get('/questions', 'QuestionController@index');
    Route::get('/question/{id}', 'QuestionController@show');
    Route::post('/questions', 'QuestionController@store');
    Route::put('/question/{id}', 'QuestionController@update');
    Route::delete('/question/{id}', 'QuestionController@destroy');
});
Route::post('/survey', 'SurveyController@store');
Route::get('/surveys', 'SurveyController@index');
Route::get('/survey/{id}', 'SurveyController@show');


Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
