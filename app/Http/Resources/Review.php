<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Review extends JsonResource
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
            'review' => $this->review,
            'rating' => $this->rating,
            'created_at' => $this->created_at->format('Y-m-d'),
            'author' => $this->user,
        ];
    }
}
