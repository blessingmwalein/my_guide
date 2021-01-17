<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileBadge extends Model
{
    use HasFactory;

    protected $guarded;

    protected $with = ['profile', 'badge'];

    public function profile(){
    	return $this->belongsTo(Profile::class);
    }

    public function badge(){
    	return $this->belongsTo(Badge::class);
    }
}
