<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamer extends Model
{
    use HasFactory;

    public function game_id()
    {
        $this->belongsTo('games', 'game_id');
    }
}
