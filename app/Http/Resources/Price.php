<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Price extends JsonResource
{
    public static function get()
    {
        return [
            'price' => [
                '0' => '0 < 10',
                '1' => '10 < 20',
                '2' => '20 < 30',
                '3' => '30 < 40',
                '4' => '40 < 50',
                '5' => '50<'
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
