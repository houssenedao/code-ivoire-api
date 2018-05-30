<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'level' => $this->level,
            'live' => $this->live,
            'live_url' => $this->live_url,
            'start_date' => (string) $this->start_date,
            'category' => $this->category,
            'tag' => $this->tag,
            'media' => $this->media,
            'reviews' => $this->reviews,
        ];
    }
}
