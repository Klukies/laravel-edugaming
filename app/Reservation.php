<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function coach() {
        return $this->belongsTo(Coach::class, 'coach_id');
    }
}
