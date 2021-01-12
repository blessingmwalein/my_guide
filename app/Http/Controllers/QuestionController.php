<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Str;
use App\Models\QuestionTag;
use App\Models\Tag;
use Inertia\Inertia as Inertia;

class QuestionController extends Controller
{
    public function index(){

        return Inertia::render('Home', ['questions' => QuestionResource::collection(Question::paginate(20))]);
    }
    public function store(QuestionRequest $request){
        
        $question = Question::create([
            'slug' =>Str::slug($request->title),
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id
        ]);

        foreach ($request->tags as $tag  ) {
            
            $tagFound =Tag::where('slug', Str::slug($tag['name']))->first();
            if(!$tagFound){
               $tag_created=  Tag::create([
                    'name' => $tag['name']
                ]);
                QuestionTag::create([
                    'tag_id'=>$tag_created->id,
                    'question_id'=>$question->id
                ]);
            }else{
                QuestionTag::create([
                    'tag_id'=>$tagFound->id,
                    'question_id'=>$question->id
                ]);
            }
        }
        // $question->tags()->sync($request->tags, false);

        return new QuestionResource($question);
    }

    public function show(Request $request,Question $question){
       
        
        return Inertia::render('SingleQuestion', ['question' => new QuestionResource($question) ]);
    }
}
