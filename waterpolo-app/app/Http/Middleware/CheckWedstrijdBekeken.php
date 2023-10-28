<?php

namespace App\Http\Middleware;

use App\Models\matchesBekijken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckWedstrijdBekeken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $minAantalBekeken = 5; // Het minimumaantal bekeken wedstrijden dat vereist is
        $matchesbekeken = matchesBekijken::all();
        foreach ($matchesbekeken as $matches)

        if (auth()->check()) {
            $aantalBekeken = auth()->user()->bekekenWedstrijden->count();

            if ($aantalBekeken >= $minAantalBekeken || auth()->user()->admin === 1) {
                return $next($request); // Als aan de voorwaarde is voldaan, ga verder
            } else {
                return redirect()->back()->with('error', 'Je moet minimaal ' . $minAantalBekeken . ' wedstrijden bekijken voordat je een nieuwe wedstrijd kunt aanmaken.');
            }
        }

        return redirect('/login');
    }

}
