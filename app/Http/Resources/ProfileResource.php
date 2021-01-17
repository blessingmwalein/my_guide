<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "profile_photo" => $this->profile_photo,
            "nick_name"=>$this->nick_name,
            "skills"=> $this->skills,
            "reputation" => $this->reputation,
            "user_id" => $this->user_id,
            "user" => $this->user,
            "about" => $this->about,
            "badges" => $this->badges,
             "tags" =>$this->tags,
            "user_works" => $this->user_works,
            "created_at" =>$this->created_at
        ];
    }
}
