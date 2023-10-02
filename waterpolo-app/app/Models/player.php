<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class player extends Model
{
    use HasFactory;
    public function team(): HasOne
    {
        return $this->hasOne(Team::class);
    }
}
