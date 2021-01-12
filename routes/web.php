<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    
    return Inertia::render('Dashboard', ['questions' => QuestionResource::collection(Question::paginate(20))]);
})->name('dashboard');
Route::get('/home','App\Http\Controllers\QuestionController@index')->name('home');
Route::middleware(['auth:sanctum', 'verified'])->get('/question/ask', function () {
    return Inertia::render('AskQuestion');
})->name('ask-question');
Route::get('/question/{question}', 'App\Http\Controllers\QuestionController@show')->name('question-single');
