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
                return redirect()->route('home')->with('error','dit is niet jouw wedstrijd');
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
        if ($match->user_id == Auth::user()->id ) {
            return view('matches.warning', compact('match') );
        }
        return redirect()->route('home')->with('error','dit is niet jouw wedstrijd');
    }
    public function destroy(matches $match)
    {
        $matches_bekeken = MatchesBekijken::where('matches_id', $match->id)->get();

        foreach ($matches_bekeken as $match_bekeken) {
            $match_bekeken->delete();
        }

        $match->delete();

        return redirect('/');
    }
    public function searchandfilter(Request $request)
    {
        $zoekTerm = $request->input('search');
        $teamFilter = $request->input('team_filter');

        $query = Matches::where('match_status', 1);

        if (!empty($zoekTerm) ) {
            $query->where(function ($query) use ($zoekTerm) {
                $query->whereHas('homeTeam', function ($q) use ($zoekTerm) {
                    $q->where('name', 'LIKE', "%$zoekTerm%");
                })->orWhereHas('awayTeam', function ($q) use ($zoekTerm) {
                    $q->where('name', 'LIKE', "%$zoekTerm%");
                })->orWhere('id', $zoekTerm);
            });
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

    public function toggleStatus( matches $match)
    {
             $match->update(['match_status' => !$match->match_status]);

        return redirect()->route('match.index');
    }

}
