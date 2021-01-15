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
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;


class QuestionController extends Controller
{
    public function index(){

        return Inertia::render('Home', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'questions' => QuestionResource::collection(Question::latest()->paginate(20)),
            "answered_questions"=> QuestionResource::collection(Question::where("answer_counter",">", 0)->paginate(20)),
            "not_answers" => QuestionResource::collection(Question::where("answer_counter","<=", 0)->paginate(20)),
            "top_5users" => ProfileResource::collection(Profile::orderBy('reputation', 'desc')->take(5)->get())
        ]);
    }
    public function questions(){

        return response()->json(['questions' =>  QuestionResource::collection(Question::all()), "top_5users"=>ProfileResource::collection(Profile::orderBy('reputation', 'desc')->take(5)->get())]);

    }


    public function store(QuestionRequest $request){
        
        $question = Question::create([
            'slug' =>Str::slug($request->title),
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
            "answer_counter" => 0
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

    public function alreadyVoted(){
        
    }
}
