<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            "slug" => $this->slug,
            "title" => $this->title,
            "body" => $this->body,
            "user_id" => $this->user_id,
            "tags" => $this->tags,
             "vote_count"=> $this->vote,
            "votes" => $this->votes,
            "stars" => $this->getTotalStars,
            "answers" => $this->answers,
            "user" => $this->user,
            "created_at" => $this->created_at
        ];
    }
}
