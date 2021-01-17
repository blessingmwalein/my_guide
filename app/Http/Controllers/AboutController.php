<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Tag;
use App\Models\ProfileTags;
use Illuminate\Support\Str;


class AboutController extends Controller
{
    //

    public function store(Request $request){

    	$about = About::create([
    		"profile_id" => $request->profile_id,
    		"about_user" => $request->about_user,
    		"github_link" => $request->github_link,
    		"social_media_link" => $request->social_media_link,
    		 "city"=> $request->city,
    		 "personal_site" => $request->personal_site,
    		 "current_status" => $request->current_status,
    		 "techs_uses" => "",
    		 "profile_id" => $request->profile_id
    	]);

    	foreach ($request->tags as $tag  ) {
            
            $tagFound =Tag::where('slug', Str::slug($tag['name']))->first();
            if(!$tagFound){
               $tag_created=  Tag::create([
                    'name' => $tag['name']
                ]);
                ProfileTags::create([
                    'tag_id'=>$tag_created->id,
                    'profile_id'=>$request->profile_id
                ]);
            }else{
                ProfileTags::create([
                    'tag_id'=>$tagFound->id,
                    'profile_id'=>$request->profile_id
                ]);
            }

        }

        return $about;

    }
}
