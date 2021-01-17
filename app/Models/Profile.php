<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded;

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function about(){
    		return $this->hasOne(About::class);
    }

    public function badges(){
    	return $this->hasMany(ProfileBadge::class);
    }

    public function user_works(){
    	return $this->hasMany(UserWork::class);
    }

    public function tags(){
        return $this->hasMany(ProfileTags::class);
    }



}
