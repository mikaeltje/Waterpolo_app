<?php

namespace App\Http\Controllers;

use App\Models\Matches;

use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function __construct()
    {
    }
    public function index(){

        $matches = Matches::all();
//        dd($matches->awayTeam);
        return view('matches.index', compact('matches'));
    }
    public function show(matches $match){

        return view('matches.show', compact('match') );
    }
    public function create(){

        return view('matches.create', ['teams' => Team::all()]);
    }
    public function store(){

        $match = new Matches(request(['home_id', 'away_id']));

        $match->save();
        return redirect('/wedstrijd');

    }
    public function edit(matches $match){
        return view('matches.edit',['match' => $match, 'teams' => Team::all()]);
    }
    public function update(matches $match)
    {

        $match->update(request()->validate([
            'home_id' => 'required',
            'away_id' => 'required',
        ]));
        return redirect('/');
    }
    public function warning(matches $match){

        return view('matches.warning', compact('match') );
    }
    public function destroy(matches $match)
    {
    $match->delete();
        return redirect('/wedstrijd');
    }
}
