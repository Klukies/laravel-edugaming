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
      $img_url = url('/images/'. $this->img_name);
      $old_browser_img_url = url('/images/' . $this->old_browser_img_name);
      return [
          'game_id' => $this->game_id,
          'title' => $this->title,
          'img_url' => $img_url,
          'old_browser_img_url' => $old_browser_img_url,
       ];
    }
}
