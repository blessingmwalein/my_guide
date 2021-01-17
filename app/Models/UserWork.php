<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWork extends Model
{
    use HasFactory;

    protected $guarded;

    protected $with=["work", "profile"];

    public function work(){
    	return $this->belongsTo(Work::class);
    }

    public function profile(){
    	return $this->belongsTo(Profile::class);
    }
}
