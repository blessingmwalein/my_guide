<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded;

    protected $with = ['answer', 'user'];

    public function answer(){
    	return $this->belongsTo(Answer::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
