<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\User;
use App\Models\Question;
use App\Http\Resources\QuestionResource;

class VoteController extends Controller
{
    public function upvote(Request $request)
    {
        $vote = Vote::where('question_id', $request->question_id)
            ->where('user_id', $request->user_id)->first();
        $question = Question::find($request->question_id);

        if($question->user->id == $request->user_id){
             return $this->jsonError("Cant Vote For your Answer", 200);
        }else{
            $question->vote += 1;
            $question->save();
            $user = User::find($request->whom_question);
            $profile = $user->profile;
            $profile->reputation += 5;
            $profile->save();
            if ($vote) {
                $vote->upvote = true;
                $vote->downvote = false;
                $vote->user_id = $request->user_id;
                $vote->question_id = $request->question_id;
                $vote->save();
            } else {
                $newVote = Vote::create([
                    'user_id' => $request->user_id,
                    'upvote' => true,
                    'question_id' => $request->question_id
                ]);
            }
            return new QuestionResource($question);
        }
        
    }

    public function downvote(Request $request)
    {
        $vote = Vote::where('question_id', $request->question_id)
            ->where('user_id', $request->user_id)->first();

        $question = Question::find($request->question_id);

        if($question->user->id === $request->user_id){
             return $this->jsonError("Cant Vote For your Answer", 200);
        }else{
            $question->vote -= 1;
            $question->save();

            $user =User::find($request->whom_question);
            $profile = $user->profile;
            $profile->reputation -= 3;
            $profile->save();
            if ($vote) {
                $vote->upvote = false;
                $vote->downvote = true;
                $vote->user_id = $request->user_id;
                $vote->question_id = $request->question_id;
                $vote->save();
            } else {
              
                $newVote = Vote::create([
                    'user_id' => $request->user_id,
                    'downvote' => true,
                    'question_id' => $request->question_id
                ]);
            }
             return new QuestionResource($question);
        }
    }
}
