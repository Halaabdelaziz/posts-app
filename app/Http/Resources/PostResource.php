<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'post title'=>$this->title,
            'post description'=>$this->body,
            'post created at'=>$this->created_at,
            'post updated at'=>$this->updated_at,
            'user'=>new UserResource($this->user)

        ];
    }
}
