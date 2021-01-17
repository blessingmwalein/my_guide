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
Route::get('question/all', 'App\Http\Controllers\QuestionController@questions');
Route::get('question/{question}', 'App\Http\Controllers\QuestionController@view');
Route::get('tags', 'App\Http\Controllers\TagController@index');
Route::post('question/upvote', 'App\Http\Controllers\VoteController@upvote');
Route::post('question/downvote', 'App\Http\Controllers\VoteController@downvote');
Route::post('answer/store', 'App\Http\Controllers\AnswerController@store');
Route::post('answer/upvote', 'App\Http\Controllers\AnswerVoteController@upvote');
Route::post('answer/downvote', 'App\Http\Controllers\AnswerVoteController@downvote');
Route::post('answer/comment', 'App\Http\Controllers\CommentController@store');
Route::post('profile/about/store', 'App\Http\Controllers\AboutController@store');
Route::get('works', 'App\Http\Controllers\WorkController@index');
Route::post('profile/work/store', 'App\Http\Controllers\UserWorkController@store');