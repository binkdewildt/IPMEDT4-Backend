<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Api\AuthController;
use \App\Http\Controllers\Api\QuestionController;

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



//* Login && Register
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');


// All the other calls, login required
Route::middleware('auth:sanctum')->group(function () {

    //* User Calls
    Route::get('/me', 'AuthController@me');


    //* All Questions Calls
    Route::get('questions', 'QuestionController@index');


    //* Specific Question Calls
    Route::get('questions/{id}', 'QuestionController@show');


    //* Score Calls
    Route::get('scores', 'ScoreController@index');
    Route::get('scores/last', 'ScoreController@show');
    Route::get('scores/me', 'ScoreController@myScores');

    Route::post('scores', 'ScoreController@store');
    Route::put('scores', 'ScoreController@update');
});


//* Admin routes
Route::middleware(['auth:sanctum', 'abilities:is-admin'])->group(function () {
    Route::put('questions', 'QuestionController@store');
    
    Route::delete('questions/{id}', 'QuestionController@destroy');
});
