<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
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
            'tag_id' => $this->id,
            'name' => $this->name,
            'created' => (string) $this->created_at,
            'url' => route('api.tags.show', $this->id),
            'stories' => StoryResource::collection($this->whenLoaded('stories')),
        ];
        
    }
}
