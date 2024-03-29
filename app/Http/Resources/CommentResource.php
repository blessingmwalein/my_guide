<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            "id" =>$this->id,
            "body" =>$this->body,
            "user_id" => $this->answer,
            "answer" => $this->answer,
            "user" => $this->user,
            "created_at" => $this->created_at
        ];
    }
}
