<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Resources\AnswerResource;
use App\Http\Resources\CommentResource;

use App\Models\Question;

class CommentController extends Controller
{
    public function store(Request $request){

    	$comment = Comment::create([
    		"body" => $request->body,
    		"user_id" => $request->user_id,
    		"answer_id" => $request->answer_id
    	]);

    	return new CommentResource($comment);
    }
}
