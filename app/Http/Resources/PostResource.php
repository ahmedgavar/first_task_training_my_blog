<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'field'=>$this->field,
            'content'=>$this->content,
            'img_name'=>$this->img_name,
            
            'user'=>new UserResource($this->user),
            
        ];

    }
}
