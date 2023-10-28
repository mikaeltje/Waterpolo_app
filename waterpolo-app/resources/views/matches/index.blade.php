@extends('layouts.app')

@section('content')
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<form action="/wedstrijd/filter" method="GET">
    <input type="text" name="search" placeholder="Zoeken op naam...">
    <select name="team_filter">
        <option value="">alle</option>
        <option value="Dames">Dames</option>
        <option value="Heren">Heren</option>
    </select>
    <button type="submit">Zoeken en Filteren</button>
</form>

<h1> wedstrijd-overzicht</h1>

<div><p>wedstrijd <a href="/wedstrijd">bekijken</a></p></div>
<div><p>wedstrijd <a href="/wedstrijd/create">create</a></p></div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 justify-center items-center">

    @foreach ($matches as $match)
        <div class="p-4 border border-gray-300 rounded text-center">
            <strong class="text-lg">Wedstrijd</strong>
            <p class="text-sm">ID: {{ $match->id }}</p>
            <p class="text-sm">Thuis team: {{ $match->homeTeam->name }}</p>
            <p class="text-sm">Uit team: {{ $match->awayTeam->name }}</p>
            <form action="{{ route('wedstrijden.bekeken', $match) }}" method="POST">
                @csrf
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Bekijk</button>
            </form>
            @if (Auth::check() && Auth::user()->admin === 1)
                <a class="text-blue-500 hover:underline" href="/wedstrijd/edit/{{ $match->id }}">Edit</a>
                <div>
                    <form method="POST" action="{{ route('matches.toggle-status', $match->id) }}">
                        @csrf
                        <button class="{{ $match->match_status ? 'bg-red-500' : 'bg-green-500' }} hover:{{ $match->match_status ? 'bg-red-700' : 'bg-green-700' }} text-white font-bold py-2 px-4 rounded" type="submit">
                            {{ $match->match_status ? 'Uitzetten' : 'Aanzetten' }}
                        </button>
                    </form>
                </div>
            @endif
        </div>
    @endforeach
</div>

@endsection
