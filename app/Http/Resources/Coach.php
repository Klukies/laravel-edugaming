<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Review as ReviewResource;

class Coach extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $coach_img_url = "http://192.168.0.17:3000/images/" . $this->img_url;
        return [
            'coach_id' => $this->coach_id,
            'username' => $this->username,
            'summary' => $this->summary,
            'description' => $this->description,
            'img_url' => $coach_img_url,
            'price' => $this->price,
            'game_id' => $this->game_id,
            'average_rating' => $this->ratings()->avg('rating'),
            'reviews' => ReviewResource::collection($this->reviews),
        ];
    }
}
