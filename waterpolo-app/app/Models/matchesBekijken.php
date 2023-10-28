<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matchesBekijken extends Model
{
    protected $table = 'matches_bekeken';
    use HasFactory;
    public function user(){
        $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function matches(){
        $this->belongsTo(Matches::class, 'matches_id', 'id');
    }
}
