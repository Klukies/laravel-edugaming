<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Game extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      $img_url = url('/images/'.$this->img_name);
      return [
        'id' => $this->id,
        'title' =>$this->title,
        'img_url' => $img_url
      ];
    }
}
