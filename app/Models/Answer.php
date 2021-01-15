<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;
class Answer extends Model
{
    use HasFactory;

    protected $guarded;

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function question(){
    	return $this->belongsTo(Question::class);
    }

    public function comments(){
    	return $this->hasMany(Comment::class);
    }

     public function votes(){
        return $this->hasMany(AnswerVote::class);
    }

}
