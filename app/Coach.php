<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    public function game() {
        return $this->belongsTo(Game::class, 'game_id');
    }

}
