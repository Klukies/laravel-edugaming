<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Price extends JsonResource
{
    public static function get()
    {
        return [
            'price' => [
                '0' => '< 10',
                '1' => '< 20',
                '2' => '< 30',
                '3' => '< 40',
                '4' => '< 50',
                '5' => '50 <'
            ]
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
