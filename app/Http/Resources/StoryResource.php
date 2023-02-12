<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
           'story_id' => $this->id,
           'title' => $this->title,
           'image' => $this->image,
           'tags' => TagResource::collection($this->whenLoaded('tags')),
           'secret' => $this->when($this->id == 2, 'secret value'),
           'url' => route('api.stories.show', $this->id),
        ];
    }
}
