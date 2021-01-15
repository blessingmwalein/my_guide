<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
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
            "body" => $this->body,
            "user_id" => $this->user_id,
            "question_id" => $this->question_id,
            "best_answer" => $this->best_answer,
            "question" => $this->question,
            "user" => $this->user,
            "created_at" =>$this->created_at,
            "votes" => $this->votes,
            "vote_count" => $this->vote,
            "comments" => $this->comments
        ];
    }
}
