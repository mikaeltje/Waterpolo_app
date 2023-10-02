<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index(){
        $matches = Matches::all();
        return view('index', compact('matches'));
    }
    public function show(){
        $wedstrijd = 'donk - zvl';
        return view('show', compact('wedstrijd') );
    }
    public function create(){

        return view('matches.create', [ 'teams' => Team::all()]);
    }
    public function store(){
        dd();
        $match = new matches;

        $match->home_id = request('home_id');
        $match->away_id = request('away_id');

        $match->save();

    }
}
