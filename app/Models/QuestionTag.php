<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class QuestionTag extends Model
{
    use HasFactory;

    protected $guarded;

    protected $with = ['tag'];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }
}
