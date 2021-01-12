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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('question/ask', 'App\Http\Controllers\QuestionController@store');
Route::get('question/{question}', 'App\Http\Controllers\QuestionController@view');
Route::get('tags', 'App\http\Controllers\TagController@index');
Route::post('question/upvote', 'App\Http\Controllers\VoteController@upvote');