<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Matches extends Model
{
    use HasFactory;

    protected $fillable = ['home_id' , 'away_id'];

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Team::class, 'home_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Team::class, 'away_id');
    }


}
