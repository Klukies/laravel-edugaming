<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function coach() {
        return $this->hasMany(Coach::class);
    }
}
