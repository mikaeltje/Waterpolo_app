<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Matches extends Model
{
    use HasFactory;

    protected $fillable = ['home_id' , 'away_id', 'user_id', 'match_status'];

    public function homeTeam()
    {
        return $this->belongsTo(\App\Models\Team::class, 'home_id');
    }


    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_id');
    }
    public function bekekenDoorGebruikers()
    {
        return $this->belongsToMany(User::class, 'matches_bekeken', 'wedstrijd_id', 'user_id');
    }



}
