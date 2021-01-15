<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\AnswerResource;

class AnswerController extends Controller
{
    public function store(Request $request){

    	$answer =Answer::create([
    		"body" => $request->body,
    		"question_id" => $request->question_id,
    		"user_id" => $request->user_id,
    		"best_answer" => false,
            "answer_counter" => 0
    	]);

    	$question = Question::find($request->question_id)->first();
    	$question->answer_counter +=1;
        $question->save();

    	return new AnswerResource($answer);
    }
}
