<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileTags extends Model
{
    use HasFactory;

    protected $guarded;

    protected $with =['profile', 'tag'];
    
    public function profile(){
    	return $this->belongsTo(Profile::class);
    }

    public function tag(){
    	return $this->belongsTo(Tag::class);
    }
}
