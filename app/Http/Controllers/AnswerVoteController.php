<?php

namespace App\Http\Controllers;

use App\Models\AnswerVote;
use App\Models\Answer;
use App\Models\Question;

use Illuminate\Http\Request;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\AnswerResource;

use App\Models\User;

class AnswerVoteController extends Controller
{
    public function upvote(Request $request)
    {
        $vote = AnswerVote::where('answer_id', $request->answer_id)
            ->where('user_id', $request->user_id)->first();
        $answer = Answer::find($request->answer_id);

        if($answer->user->id == $request->user_id){
             return $this->jsonError("Cant Vote For your Answer", 200);
        }else{
            $answer->vote += 1;
            $answer->save();
            $user = User::find($request->whom_answer);
            $profile = $user->profile;
            $profile->reputation += 5;
            $profile->save();
            if ($vote) {
                $vote->upvote = true;
                $vote->downvote = false;
                $vote->user_id = $request->user_id;
                $vote->answer_id = $request->answer_id;
                $vote->save();
            } else {
                $newVote = AnswerVote::create([
                    'user_id' => $request->user_id,
                    'upvote' => true,
                    'answer_id' => $request->answer_id
                ]);
            }
            
            return new AnswerResource($answer);
        }
        
    }

    public function downvote(Request $request)
    {
        $vote = AnswerVote::where('answer_id', $request->answer_id)
            ->where('user_id', $request->user_id)->first();

        $answer = Answer::find($request->answer_id);

        if($answer->user->id === $request->user_id){
             return $this->jsonError("Cant Vote For your Answer", 200);
        }else{
            $answer->vote -= 1;
            $answer->save();

            $user =User::find($request->whom_answer);
            $profile = $user->profile;
            $profile->reputation -= 3;
            $profile->save();
            if ($vote) {
                $vote->upvote = false;
                $vote->downvote = true;
                $vote->user_id = $request->user_id;
                $vote->answer_id = $request->answer_id;
                $vote->save();
            } else {
              
                $newVote = AnswerVote::create([
                    'user_id' => $request->user_id,
                    'downvote' => true,
                    'answer_id' => $request->answer_id
                ]);
            }

            return new AnswerResource($answer);
            
        }
    }
}
