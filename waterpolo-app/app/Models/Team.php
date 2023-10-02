<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Team extends Model
{
    use HasFactory;
    public function players(): HasMany{
        return $this->hasMany(player::class);
    }
    public function matches(): HasOne{
        return $this->hasOne(matches::class);
    }
}
