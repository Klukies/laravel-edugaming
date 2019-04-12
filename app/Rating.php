<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function coach() {
        return $this->belongsTo(Coach::class, 'coach_id');
    }

    public $timestamps = false;
}
