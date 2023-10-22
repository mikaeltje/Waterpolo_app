<?php

namespace App\Http\Controllers;

use App\Models\Matches;

use App\Models\matchesBekijken;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
//        $user = auth()->user();
//        $user->bekeken_wedstrijden += 1;
//        $user->save();
        if (auth()->user()->bekekenWedstrijden()->where('matches_id', $match->id)->count() === 0) {
            auth()->user()->bekekenWedstrijden()->attach($match);
            $match->increment('bekeken');
        }

        return view('matches.show', compact('match') );
    }
    public function create(){

        return view('matches.create', ['teams' => Team::all()]);
    }
    public function store(){

        $match = new Matches(request(['home_id', 'away_id']));
        $match->user_id = Auth::user()->id;
        $match->save();
        return redirect('/wedstrijd');

    }
    public function edit(matches $match){
        if ($match->user_id == Auth::user()->id ) {
            return view('matches.edit', ['match' => $match, 'teams' => Team::all()]);

        }
                return redirect('/wedstrijd');
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
    public function searchandfilter(Request $request)
    {
        $zoekTerm = $request->input('search');
        $teamFilter = $request->input('team_filter');

        // Voer de zoekopdracht uit op de matches-tabel.
        $query = Matches::query();

        if (!empty($zoekTerm)) {
            $query-> whereHas('homeTeam', function ($query) use ($zoekTerm) {
                $query->where('name', 'LIKE', "%$zoekTerm");
            });
//                where('name', 'LIKE', "%$zoekTerm%");

        }

        if (!empty($teamFilter)) {
            $query->where(function ($q) use ($teamFilter) {
                $q->whereHas('homeTeam', function ($query) use ($teamFilter) {
                    $query->where('name', 'LIKE', "%$teamFilter%");
                })->orWhereHas('awayTeam', function ($query) use ($teamFilter) {
                    $query->where('name', 'LIKE', "%$teamFilter%");
                });
            });
        }

        $resultaten = $query->get();

        return view('matches.searchresults', compact('resultaten'));
    }
    public function bekijkwedstrijd($matches){
        $aantalBekeken = auth()->user()->aantalBekekenWedstrijden();

    }

}
