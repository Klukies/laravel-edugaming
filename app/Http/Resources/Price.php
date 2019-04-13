<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Price extends JsonResource
{
    public static function get()
    {
        return [
            '10' => '< 10',
            '20' => '< 20',
            '30' => '< 30',
            '40' => '< 40',
            '50' => '< 50',
            '50+' => '50 <'
        ];
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
