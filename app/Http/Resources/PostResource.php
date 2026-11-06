<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *thies resource is used to format the data of a Post model instance 
     *into a structured array for API responses. 
     * It includes the post's ID, title, creation time (formatted as a human-readable difference), and slug.
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'title' => $this->title,
            'created_at' => $this->created_at ? $this->created_at->diffForHumans() : null,
            'slug' => $this->slug ,
            'profile' => $this->profile ? ProfileRecource::make($this->profile->user) : null,
        ];
    }
}
