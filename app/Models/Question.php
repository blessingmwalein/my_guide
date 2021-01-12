<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $guarded;

    public function getRouteKeyName()
    {
        return "slug";
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function tags(){
        return $this->hasMany(QuestionTag::class);
    }
    public function votes(){
        return $this->hasMany(Vote::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getTotalStars(){
        return $this->hasMany(Vote::class)
                ->where('question_id' , $this->id)
                ->where('favorite', 1);
    }
}
